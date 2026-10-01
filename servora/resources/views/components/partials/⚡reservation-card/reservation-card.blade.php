@php
    $accent = match (true) {
        $reservation->isArrivingSoon() => 'border-l-4 border-l-[#9A762B]',
        $reservation->status->value === 'seated' => 'border-l-4 border-l-[#294936]',
        in_array($reservation->status->value, ['completed', 'no_show']) => 'border-l-4 border-l-[#718076]',
        default => 'border-l-4 border-l-[#DCE5DC]',
    };
    $faded = in_array($reservation->status->value, ['completed', 'no_show']) ? 'opacity-60' : '';
@endphp

<article wire:key="reservation-card-{{ $reservation->id }}"
    class="rounded-2xl border border-[#DCE5DC] {{ $accent }} {{ $faded }} bg-white p-4 shadow-sm transition hover:shadow-md">

    <div class="flex items-start justify-between gap-2">
        <div class="min-w-0">
            <h4 class="truncate text-sm font-semibold text-[#183524]">{{ $reservation->guest->name }}</h4>
            <p class="mt-0.5 text-xs text-[#718076]">
                {{ $reservation->reserved_for->format('H:i') }}–{{ $reservation->endsAt()->format('H:i') }}
                · {{ $reservation->party_size }}
                {{ \Illuminate\Support\Str::plural('guest', $reservation->party_size) }}
            </p>
        </div>

        @if (in_array($reservation->status->value, ['confirmed', 'seated']))
            <div class="relative shrink-0" x-data="{ open: false }">
                <button type="button" x-on:click="open = ! open"
                    class="flex h-7 w-7 items-center justify-center rounded-lg text-[#8FA58B] hover:bg-[#F8FAF6]">
                    <x-tabler-dots class="h-4 w-4" />
                </button>
                <div x-show="open" x-on:click.away="open = false" x-cloak
                    class="absolute right-0 z-10 mt-1 w-36 overflow-hidden rounded-xl border border-[#DCE5DC] bg-white shadow-lg">
                    @if ($reservation->status->value === 'confirmed')
                        <button type="button" wire:click="openEditReservationModal({{ $reservation->id }})"
                            x-on:click="open = false"
                            class="block w-full px-3 py-2 text-left text-xs font-medium text-[#294936] hover:bg-[#F8FAF6]">
                            Edit
                        </button>
                        <button type="button" wire:click="markNoShow({{ $reservation->id }})" x-on:click="open = false"
                            class="block w-full px-3 py-2 text-left text-xs font-medium text-[#B94A48] hover:bg-[#FBEAEA]">
                            Mark No-show
                        </button>
                    @endif
                    <button type="button" wire:click="cancelReservation({{ $reservation->id }})" x-on:click="open = false"
                        class="block w-full px-3 py-2 text-left text-xs font-medium text-[#B94A48] hover:bg-[#FBEAEA]">
                        Cancel
                    </button>
                </div>
            </div>
        @endif
    </div>

    <div class="mt-2">
        @if ($reservation->table)
            <a href="/dashboard/tables?table={{ $reservation->table->id }}" wire:navigate
                class="inline-flex items-center gap-1 text-xs text-[#8FA58B] underline decoration-dotted underline-offset-2 hover:text-[#294936]">
                <x-tabler-armchair class="h-3.5 w-3.5" />
                {{ $reservation->table->name }}
            </a>
        @else
            <span class="inline-flex items-center gap-1 text-xs text-[#8FA58B]">
                <x-tabler-armchair class="h-3.5 w-3.5" />
                No table
            </span>
        @endif
    </div>

    @if ($reservation->notes)
        <p class="mt-2 truncate text-xs italic text-[#8FA58B]">{{ $reservation->notes }}</p>
    @endif

    @if ($reservation->status->value === 'confirmed')
        <button wire:click="seatReservation({{ $reservation->id }})"
            class="mt-3 flex w-full items-center justify-center gap-2 rounded-xl bg-[#294936] px-3 py-2 text-xs font-medium text-white transition hover:bg-[#183524]">
            <x-tabler-armchair class="h-4 w-4" />
            Seat
        </button>
    @elseif ($reservation->status->value === 'seated')
        <button wire:click="completeReservation({{ $reservation->id }})"
            class="mt-3 flex w-full items-center justify-center gap-2 rounded-xl border border-[#DCE5DC] px-3 py-2 text-xs font-medium text-[#294936] transition hover:bg-[#F8FAF6]">
            <x-tabler-flag class="h-4 w-4" />
            Complete
        </button>
    @else
        <p
            class="mt-3 text-center text-[10px] font-semibold uppercase tracking-wide {{ $reservation->status->textColor() }}">
            {{ $reservation->status->label() }}
        </p>
    @endif

</article>