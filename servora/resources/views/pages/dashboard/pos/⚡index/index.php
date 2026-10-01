<?php

use Livewire\Component;

use App\Models\DiningTable;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


new class extends Component {
    public ?int $diningTableId = null;

    public string $search = '';

    public string $activeCategory = 'All';

    public int $guestCount = 4;

    public string $paymentMethod = 'cash';

    /*
    |--------------------------------------------------------------------------
    | Restaurant charges
    |--------------------------------------------------------------------------
    |
    | 10% service charge
    | 10% tax
    |
    | These can later be moved into restaurant settings.
    |
    */

    public float $serviceChargeRate = 0.10;

    public float $taxRate = 0.10;

    public function mount(): void
    {
        $this->diningTableId = request()->integer('table');

        if (!$this->diningTableId) {
            return;
        }

        $openOrder = Order::query()
            ->where('dining_table_id', $this->diningTableId)
            ->whereIn('status', [
                'open',
                'sent',
                'preparing',
                'served',
            ])
            ->latest()
            ->first();

        if ($openOrder) {
            $this->guestCount = $openOrder->guest_count;
        }
    }

    public function render()
    {
        $categories = MenuCategory::query()
            ->where('is_active', true)
            ->withCount([
                'items' => fn($query) => $query->where('is_available', true),
            ])
            ->orderBy('sort_order')
            ->get();

        $menuItems = MenuItem::query()
            ->with('category')
            ->where('is_available', true)
            ->when(
                $this->activeCategory !== 'All',
                fn($query) => $query->whereHas(
                    'category',
                    fn($category) => $category->where('name', $this->activeCategory)
                )
            )
            ->when(
                filled($this->search),
                fn($query) => $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                })
            )
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $order = $this->currentOrder();

        if ($order) {
            $order->load([
                'diningTable',
                'items.menuItem.category',
            ]);
        }

        return $this->view([
            'categories' => $categories,
            'menuItems' => $menuItems,
            'order' => $order,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Order
    |--------------------------------------------------------------------------
    */

    protected function currentOrder(): ?Order
    {
        if (!$this->diningTableId) {
            return null;
        }

        return Order::query()
            ->where('dining_table_id', $this->diningTableId)
            ->whereIn('status', [
                'open',
                'sent',
                'preparing',
                'served',
            ])
            ->latest()
            ->first();
    }

    protected function getOrCreateOrder(): Order
    {
        if (!$this->diningTableId) {
            abort(404, 'No dining table selected.');
        }

        $order = $this->currentOrder();

        if ($order) {
            return $order;
        }

        return DB::transaction(function () {
            $table = DiningTable::lockForUpdate()
                ->findOrFail($this->diningTableId);

            $order = Order::create([
                'dining_table_id' => $table->id,
                'order_number' => $this->generateOrderNumber(),
                'type' => 'dine_in',
                'status' => 'open',
                'guest_count' => $this->guestCount,
                'subtotal' => 0,
                'service_charge' => 0,
                'tax' => 0,
                'discount' => 0,
                'total' => 0,
            ]);

            $table->update([
                'status' => 'occupied',
            ]);

            return $order;
        });
    }

    protected function generateOrderNumber(): string
    {
        do {
            $number = 'ORD-' . now()->format('ymd') . '-' . strtoupper(
                Str::random(5)
            );
        } while (Order::where('order_number', $number)->exists());

        return $number;
    }

    /*
    |--------------------------------------------------------------------------
    | Menu
    |--------------------------------------------------------------------------
    */

    public function addToOrder(int $menuItemId): void
    {
        $menuItem = MenuItem::query()
            ->where('is_available', true)
            ->findOrFail($menuItemId);

        DB::transaction(function () use ($menuItem) {
            $order = $this->getOrCreateOrder();

            $item = OrderItem::query()
                ->where('order_id', $order->id)
                ->where('menu_item_id', $menuItem->id)
                ->first();

            if ($item instanceof OrderItem) {
                $newQuantity = $item->quantity + 1;

                $item->update([
                    'quantity' => $newQuantity,
                    'subtotal' => $newQuantity * (float) $item->unit_price,
                ]);
            } else {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $menuItem->id,
                    'quantity' => 1,
                    'unit_price' => $menuItem->price,
                    'subtotal' => $menuItem->price,
                ]);
            }

            $this->recalculateOrder($order);
        });
    }

    public function increaseQuantity(int $orderItemId): void
    {
        $order = $this->currentOrder();

        if (!$order) {
            return;
        }

        $item = OrderItem::query()
            ->where('order_id', $order->id)
            ->findOrFail($orderItemId);

        $newQuantity = $item->quantity + 1;

        $item->update([
            'quantity' => $newQuantity,
            'subtotal' => $newQuantity * (float) $item->unit_price,
        ]);

        $this->recalculateOrder($order);
    }

    public function decreaseQuantity(int $orderItemId): void
    {
        $order = $this->currentOrder();

        if (!$order) {
            return;
        }

        $item = OrderItem::query()
            ->where('order_id', $order->id)
            ->findOrFail($orderItemId);

        if ($item->quantity <= 1) {
            $item->delete();
        } else {
            $newQuantity = $item->quantity - 1;

            $item->update([
                'quantity' => $newQuantity,
                'subtotal' => $newQuantity * (float) $item->unit_price,
            ]);
        }

        $this->recalculateOrder($order);
    }

    public function removeFromOrder(int $orderItemId): void
    {
        $order = $this->currentOrder();

        if (!$order) {
            return;
        }

        OrderItem::query()
            ->where('order_id', $order->id)
            ->findOrFail($orderItemId)
            ->delete();

        $this->recalculateOrder($order);
    }

    public function clearOrder(): void
    {
        $order = $this->currentOrder();

        if (!$order) {
            return;
        }

        /*
         * Only an open order can be cleared.
         * Sent/preparing/served orders should not be destroyed.
         */
        if ($order->status !== 'open') {
            return;
        }

        DB::transaction(function () use ($order) {
            $order->items()->delete();
            $order->delete();

            if ($this->diningTableId) {
                DiningTable::whereKey($this->diningTableId)
                    ->update([
                        'status' => 'available',
                    ]);
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Guest count
    |--------------------------------------------------------------------------
    */

    public function increaseGuests(): void
    {
        $this->guestCount = min(99, $this->guestCount + 1);

        $this->updateOrderGuestCount();
    }

    public function decreaseGuests(): void
    {
        $this->guestCount = max(1, $this->guestCount - 1);

        $this->updateOrderGuestCount();
    }

    protected function updateOrderGuestCount(): void
    {
        $order = $this->currentOrder();

        if ($order) {
            $order->update([
                'guest_count' => $this->guestCount,
            ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Totals
    |--------------------------------------------------------------------------
    */

    protected function recalculateOrder(Order $order): void
    {
        $order->load('items');

        $subtotal = $order->items->sum(function ($item) {
            return (float) $item->subtotal;
        });

        $serviceCharge = round(
            $subtotal * $this->serviceChargeRate,
            2
        );

        $tax = round(
            ($subtotal + $serviceCharge) * $this->taxRate,
            2
        );

        $total = round(
            $subtotal +
            $serviceCharge +
            $tax -
            (float) $order->discount,
            2
        );

        $order->update([
            'subtotal' => $subtotal,
            'service_charge' => $serviceCharge,
            'tax' => $tax,
            'total' => max(0, $total),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Payment
    |--------------------------------------------------------------------------
    */

    public function selectPaymentMethod(string $method): void
    {
        if (!in_array($method, ['cash', 'card'], true)) {
            return;
        }

        $this->paymentMethod = $method;
    }

    public function charge(): void
    {
        $order = $this->currentOrder();

        if (!$order || $order->items()->count() === 0) {
            return;
        }

        if ($order->status !== 'open') {
            return;
        }

        DB::transaction(function () use ($order) {
            $this->recalculateOrder($order);

            $order->refresh();

            $order->payments()->create([
                'method' => $this->paymentMethod,
                'amount' => $order->total,
                'status' => 'completed',
                'reference' => $order->order_number,
            ]);

            $order->update([
                'status' => 'paid',
            ]);

            if ($this->diningTableId) {
                DiningTable::whereKey($this->diningTableId)
                    ->update([
                        'status' => 'available',
                    ]);
            }
        });

        session()->flash(
            'success',
            "Order {$order->order_number} has been paid."
        );
    }

};