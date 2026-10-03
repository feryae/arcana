<?php

use App\Actions\AddItemToOrder;
use App\Models\MenuItem;
use App\Models\ModifierOption;
use App\Models\Order;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * Drop-in "add to order" flow for the POS.
 *
 * Usage in the POS blade:
 *   <livewire:modifier-picker :order-id="$order?->id" :key="'picker-'.($order?->id ?? 'none')" />
 *
 * Menu tile click:
 *   wire:click="$dispatch('pick-item', { itemId: {{ $item->id }} })"
 *
 * Listen in the POS component for the refresh:
 *   #[On('order-item-added')]
 *   public function refreshOrder(): void { ... recalculate totals ... }
 */
new class extends Component {
    public ?int $orderId = null;

    public ?int $itemId = null;

    public int $quantity = 1;

    /** Chosen options. single group: '12', multiple group: ['3', '5'], keyed by group id. */
    public array $selected = [];

    public string $notes = '';

    public ?string $notice = null;

    public function mount(?int $orderId = null): void
    {
        $this->orderId = $orderId;
    }

    #[On('pick-item')]
    public function pick(int $itemId): void
    {
        $this->notice = null;

        if (!$this->orderId) {
            $this->notice = 'Select a table or start an order first.';
            return;
        }

        $item = MenuItem::orderable()->with('modifierGroups.options')->find($itemId);

        if (!$item) {
            $this->notice = 'That dish is no longer available.';
            return;
        }

        // Nothing to choose: add straight away.
        if ($item->modifierGroups->isEmpty()) {
            $this->itemId = $item->id;
            $this->add();
            return;
        }

        $this->reset(['quantity', 'selected', 'notes']);

        foreach ($item->modifierGroups as $group) {
            $this->selected[$group->id] = $group->type === 'multiple' ? [] : '';
        }

        $this->resetValidation();
        $this->itemId = $item->id;
    }

    public function add(): void
    {
        $order = Order::findOrFail($this->orderId);
        $item = MenuItem::findOrFail($this->itemId);

        // Throws ValidationException; Livewire turns it into form errors.
        app(AddItemToOrder::class)->handle(
            $order,
            $item,
            $this->quantity,
            $this->chosenOptionIds(),
            $this->notes ?: null,
        );

        $this->dispatch('order-item-added', orderId: $order->id);
        $this->close();
    }

    public function close(): void
    {
        $this->reset(['itemId', 'quantity', 'selected', 'notes']);
        $this->resetValidation();
    }

    public function dismissNotice(): void
    {
        $this->notice = null;
    }

    #[Computed]
    public function item(): ?MenuItem
    {
        return $this->itemId
            ? MenuItem::with(['modifierGroups.options', 'ingredients'])->find($this->itemId)
            : null;
    }

    #[Computed]
    public function unitPrice(): float
    {
        if (!$this->item) {
            return 0;
        }

        $deltas = ModifierOption::whereIn('id', $this->chosenOptionIds())->sum('price_delta');

        return round((float) $this->item->price + (float) $deltas, 2);
    }

    /** @return array<int> */
    private function chosenOptionIds(): array
    {
        return collect($this->selected)
            ->flatten()
            ->filter(fn($id) => $id !== '' && $id !== null)
            ->map(fn($id) => (int) $id)
            ->values()
            ->all();
    }
};