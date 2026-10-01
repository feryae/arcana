<div class="min-h-[calc(100vh-80px)] bg-[#F8FAF6]">

    @php
        use Illuminate\Support\Str;
    @endphp

    <div class="mx-auto flex min-h-[calc(100vh-80px)] max-w-[1800px] flex-col lg:flex-row">

        {{-- ========================================================= --}}
        {{-- LEFT : MENU --}}
        {{-- ========================================================= --}}

        <section class="flex min-w-0 flex-1 flex-col">

            {{-- ===================================================== --}}
            {{-- POS HEADER --}}
            {{-- ===================================================== --}}

            <header class="border-b border-[#DCE5DC] bg-white">

                <div class="px-5 py-5 sm:px-6">

                    <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">

                        {{-- Title --}}

                        <div class="flex items-center gap-3">

                            <a
                                href="#"
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-[#DCE5DC] text-[#718076] transition hover:bg-[#F8FAF6] hover:text-[#294936]"
                            >
                                <x-tabler-arrow-left class="h-4 w-4" />
                            </a>

                            <div>

                                <div class="flex items-center gap-2.5">

                                    <h1 class="text-xl font-semibold tracking-tight text-[#183524]">
                                        Point of Sale
                                    </h1>

                                    @if ($diningTableId)

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-[#E8F0E5] px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.12em] text-[#5E8067]"
                                        >
                                            <span class="h-1.5 w-1.5 rounded-full bg-[#5E8067]"></span>
                                            Open
                                        </span>

                                    @else

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-[#FBF7EE] px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.12em] text-[#9A7B45]"
                                        >
                                            <x-tabler-lock class="h-3 w-3" />
                                            No table
                                        </span>

                                    @endif

                                </div>

                                <div class="mt-1 flex flex-wrap items-center gap-x-2 gap-y-1 text-xs text-[#8A968D]">

                                    <span>
                                        {{ $order?->diningTable?->name ?? 'Select a table' }}
                                    </span>

                                    <span class="text-[#C3CCC4]">·</span>

                                    <span>
                                        {{ now()->format('l, d F') }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- Search --}}

                        <div class="relative w-full xl:max-w-sm">

                            <x-tabler-search
                                class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-[#8FA58B]"
                            />

                            <input
                                type="search"
                                wire:model.live.debounce.250ms="search"
                                placeholder="Search dishes..."
                                @disabled(!$diningTableId)
                                class="w-full rounded-xl border border-[#DCE5DC] bg-[#F8FAF6] py-3 pl-11 pr-10 text-sm text-[#26342A] outline-none transition placeholder:text-[#A1ACA3] focus:border-[#8FA58B] focus:bg-white focus:ring-2 focus:ring-[#E8F0E5] disabled:cursor-not-allowed disabled:bg-[#F1F4F1] disabled:text-[#A1ACA3]"
                            />

                            <div
                                wire:loading
                                wire:target="search"
                                class="absolute right-4 top-1/2 -translate-y-1/2"
                            >
                                <svg class="h-4 w-4 animate-spin text-[#5E8067]" viewBox="0 0 24 24" fill="none">
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>

                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                                    ></path>
                                </svg>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- TABLE REQUIRED NOTICE --}}
                {{-- ================================================= --}}

                @if (!$diningTableId)

                    <div class="border-t border-[#E5DCC8] bg-[#FBF7EE] px-5 py-3 sm:px-6">

                        <div class="flex items-center gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#F3E8D1] text-[#9A7B45]">
                                <x-tabler-armchair-2 class="h-4 w-4" />
                            </div>

                            <div class="min-w-0">

                                <p class="text-sm font-semibold text-[#5E4A2F]">
                                    Select a dining table
                                </p>

                                <p class="mt-0.5 text-xs text-[#8A968D]">
                                    Choose a table before adding dishes to an order.
                                </p>

                            </div>

                            <a
                                href="{{ route('tables') }}"
                                class="ml-auto inline-flex shrink-0 items-center gap-1.5 rounded-lg bg-[#294936] px-3.5 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-[#183524]"
                            >
                                Choose table

                                <x-tabler-arrow-right class="h-3.5 w-3.5" />
                            </a>

                        </div>

                    </div>

                @endif


                {{-- ================================================= --}}
                {{-- CATEGORIES --}}
                {{-- ================================================= --}}

                <div
                    class="border-t border-[#DCE5DC] px-5 sm:px-6"
                    @class([
                        'opacity-60' => !$diningTableId,
                    ])
                >

                    <div class="flex gap-1 overflow-x-auto py-3 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">

                        {{-- All --}}

                        <button
                            type="button"
                            wire:click="$set('activeCategory', 'All')"
                            @disabled(!$diningTableId)
                            @class([
                                'flex shrink-0 items-center gap-2 rounded-lg px-4 py-2.5 text-sm font-medium transition',
                                'bg-[#294936] text-white shadow-sm' => $activeCategory === 'All' && $diningTableId,
                                'text-[#718076] hover:bg-[#F8FAF6] hover:text-[#294936]' => $activeCategory !== 'All' && $diningTableId,
                                'cursor-not-allowed text-[#A1ACA3]' => !$diningTableId,
                            ])
                        >
                            <x-tabler-layout-grid class="h-4 w-4" />
                            All
                        </button>


                        @foreach ($categories as $category)

                            <button
                                type="button"
                                wire:click="$set('activeCategory', @js($category->name))"
                                @disabled(!$diningTableId)
                                @class([
                                    'flex shrink-0 items-center gap-2 rounded-lg px-4 py-2.5 text-sm font-medium transition',
                                    'bg-[#294936] text-white shadow-sm' => $activeCategory === $category->name && $diningTableId,
                                    'text-[#718076] hover:bg-[#F8FAF6] hover:text-[#294936]' => $activeCategory !== $category->name && $diningTableId,
                                    'cursor-not-allowed text-[#A1ACA3]' => !$diningTableId,
                                ])
                            >

                                @switch($category->icon)

                                    @case('flame')
                                        <x-tabler-flame class="h-4 w-4" />
                                    @break

                                    @case('soup')
                                        <x-tabler-soup class="h-4 w-4" />
                                    @break

                                    @case('glass')
                                    @case('glass-full')
                                        <x-tabler-glass-full class="h-4 w-4" />
                                    @break

                                    @case('cake')
                                        <x-tabler-cake class="h-4 w-4" />
                                    @break

                                    @default
                                        <x-tabler-bowl-spoon class="h-4 w-4" />

                                @endswitch

                                {{ $category->name }}

                                <span
                                    @class([
                                        'text-[10px]',
                                        'text-white/60' => $activeCategory === $category->name && $diningTableId,
                                        'text-[#A1ACA3]' => $activeCategory !== $category->name || !$diningTableId,
                                    ])
                                >
                                    {{ $category->items_count }}
                                </span>

                            </button>

                        @endforeach

                    </div>

                </div>

            </header>


            {{-- ===================================================== --}}
            {{-- MENU GRID --}}
            {{-- ===================================================== --}}

            <div class="min-h-0 flex-1 overflow-y-auto p-5 sm:p-6">

                @if ($menuItems->isNotEmpty())

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">

                        @foreach ($menuItems as $item)

                            <button
                                type="button"
                                wire:key="menu-item-{{ $item->id }}"
                                wire:click="addToOrder({{ $item->id }})"
                                wire:loading.attr="disabled"
                                wire:target="addToOrder({{ $item->id }})"
                                @disabled(!$diningTableId)
                                class="group relative flex min-h-[220px] flex-col overflow-hidden rounded-2xl border border-[#DCE5DC] bg-white p-5 text-left transition duration-200 hover:-translate-y-0.5 hover:border-[#B9CCBA] hover:shadow-[0_8px_24px_rgba(41,73,54,0.06)] disabled:pointer-events-none disabled:cursor-not-allowed"
                            >

                                {{-- ================================================= --}}
                                {{-- MENU CONTENT --}}
                                {{-- ================================================= --}}

                                <div
                                    @class([
                                        'transition duration-200',
                                        'opacity-100' => $diningTableId,
                                        'opacity-45' => !$diningTableId,
                                    ])
                                >

                                    {{-- Top --}}

                                    <div class="flex items-start justify-between gap-4">

                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#E8F0E5] text-[#5E8067]">

                                            @switch($item->icon)

                                                @case('flame')
                                                    <x-tabler-flame class="h-5 w-5" />
                                                @break

                                                @case('meat')
                                                    <x-tabler-meat class="h-5 w-5" />
                                                @break

                                                @case('soup')
                                                    <x-tabler-soup class="h-5 w-5" />
                                                @break

                                                @case('beer')
                                                    <x-tabler-beer class="h-5 w-5" />
                                                @break

                                                @case('glass-full')
                                                    <x-tabler-glass-full class="h-5 w-5" />
                                                @break

                                                @case('cake')
                                                    <x-tabler-cake class="h-5 w-5" />
                                                @break

                                                @default
                                                    <x-tabler-bowl-spoon class="h-5 w-5" />

                                            @endswitch

                                        </div>

                                        <span class="shrink-0 text-sm font-bold text-[#294936]">
                                            {{ number_format($item->price, 2) }}

                                            <span class="text-[10px] font-medium text-[#8A968D]">
                                                silver
                                            </span>
                                        </span>

                                    </div>


                                    {{-- Content --}}

                                    <div class="mt-5">

                                        <h3 class="font-semibold text-[#183524]">
                                            {{ $item->name }}
                                        </h3>

                                        <p class="mt-2 line-clamp-3 text-xs leading-5 text-[#718076]">
                                            {{ $item->description }}
                                        </p>

                                    </div>


                                    {{-- Bottom --}}

                                    <div class="mt-auto flex items-center justify-between pt-5">

                                        <span class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#8FA58B]">
                                            {{ $item->category->name }}
                                        </span>

                                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#F8FAF6] text-[#294936] transition group-hover:bg-[#E8F0E5]">
                                            <x-tabler-plus class="h-4 w-4" />
                                        </span>

                                    </div>

                                </div>


                                {{-- ================================================= --}}
                                {{-- LOCKED OVERLAY --}}
                                {{-- ================================================= --}}

                                @if (!$diningTableId)

                                    <div class="absolute inset-0 z-10 flex items-center justify-center bg-white/60 backdrop-blur-[2px]">

                                        <div class="flex items-center gap-2 rounded-xl border border-[#E5DCC8] bg-[#FBF7EE] px-3.5 py-2.5 text-xs font-semibold text-[#5E4A2F] shadow-sm">

                                            <div class="flex h-6 w-6 items-center justify-center rounded-lg bg-[#F3E8D1]">

                                                <x-tabler-lock class="h-3.5 w-3.5 text-[#9A7B45]" />

                                            </div>

                                            Select a table first

                                        </div>

                                    </div>

                                @endif


                                {{-- ================================================= --}}
                                {{-- LOADING OVERLAY --}}
                                {{-- ================================================= --}}

                                <div
                                    wire:loading
                                    wire:target="addToOrder({{ $item->id }})"
                                    class="absolute inset-0 z-20 flex items-center justify-center rounded-2xl bg-white/75 backdrop-blur-[1px]"
                                >

                                    <div class="flex items-center gap-2 rounded-xl border border-[#DCE5DC] bg-white px-3.5 py-2.5 text-xs font-semibold text-[#294936] shadow-sm">

                                        <svg class="h-4 w-4 animate-spin text-[#294936]" viewBox="0 0 24 24" fill="none">

                                            <circle
                                                class="opacity-25"
                                                cx="12"
                                                cy="12"
                                                r="10"
                                                stroke="currentColor"
                                                stroke-width="4"
                                            ></circle>

                                            <path
                                                class="opacity-75"
                                                fill="currentColor"
                                                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                                            ></path>

                                        </svg>

                                        Adding...

                                    </div>

                                </div>

                            </button>

                        @endforeach

                    </div>

                @else

                    {{-- Empty search state --}}

                    <div class="flex min-h-[420px] items-center justify-center">

                        <div class="max-w-sm text-center">

                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white shadow-sm ring-1 ring-[#DCE5DC]">

                                <x-tabler-search-off class="h-7 w-7 text-[#8FA58B]" />

                            </div>

                            <h3 class="mt-5 font-semibold text-[#294936]">
                                No dishes found
                            </h3>

                            <p class="mt-2 text-sm leading-6 text-[#8A968D]">
                                Try another search or choose a different menu category.
                            </p>

                            @if (filled($search))

                                <button
                                    type="button"
                                    wire:click="$set('search', '')"
                                    class="mt-5 text-xs font-semibold text-[#5E8067] hover:text-[#294936]"
                                >
                                    Clear search
                                </button>

                            @endif

                        </div>

                    </div>

                @endif

            </div>

        </section>


        {{-- ========================================================= --}}
        {{-- RIGHT : ORDER --}}
        {{-- ========================================================= --}}

        <aside
            class="flex w-full shrink-0 flex-col border-t border-[#DCE5DC] bg-white lg:sticky lg:top-0 lg:h-[calc(100vh-80px)] lg:w-[400px] lg:border-l lg:border-t-0"
        >

            {{-- ===================================================== --}}
            {{-- ORDER HEADER --}}
            {{-- ===================================================== --}}

            <div class="shrink-0 border-b border-[#DCE5DC] p-5 sm:p-6">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8FA58B]">
                            Current order
                        </p>

                        <h2 class="mt-1 text-xl font-semibold text-[#183524]">
                            {{ $order?->diningTable?->name ?? 'Table' }}
                        </h2>

                        @if ($order)

                            <p class="mt-1 text-xs text-[#8A968D]">
                                {{ $order->order_number }}
                            </p>

                        @else

                            <p class="mt-1 text-xs text-[#8A968D]">
                                @if ($diningTableId)
                                    No order started
                                @else
                                    No table selected
                                @endif
                            </p>

                        @endif

                    </div>


                    @if ($order && $order->status === 'open')

                        <button
                            type="button"
                            wire:click="clearOrder"
                            wire:confirm="Clear all items from this order?"
                            class="rounded-lg px-2 py-1.5 text-xs font-medium text-[#8A968D] transition hover:bg-[#FFF4F3] hover:text-[#B94A48]"
                        >
                            Clear
                        </button>

                    @endif

                </div>


                {{-- ================================================= --}}
                {{-- GUEST SELECTOR --}}
                {{-- ================================================= --}}

                <div
                    @class([
                        'mt-5 flex items-center justify-between rounded-xl p-3 transition',
                        'bg-[#F8FAF6]' => $diningTableId,
                        'bg-[#F1F3F1]' => !$diningTableId,
                    ])
                >

                    <div class="flex items-center gap-3">

                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-white shadow-sm">

                            <x-tabler-users
                                @class([
                                    'h-4 w-4',
                                    'text-[#5E8067]' => $diningTableId,
                                    'text-[#A1ACA3]' => !$diningTableId,
                                ])
                            />

                        </div>

                        <div>

                            <p class="text-[10px] font-semibold uppercase tracking-[0.12em] text-[#8A968D]">
                                Guests
                            </p>

                            <p
                                @class([
                                    'mt-0.5 text-sm font-semibold',
                                    'text-[#294936]' => $diningTableId,
                                    'text-[#A1ACA3]' => !$diningTableId,
                                ])
                            >
                                {{ $guestCount }}
                                {{ Str::plural('guest', $guestCount) }}
                            </p>

                        </div>

                    </div>


                    <div
                        class="flex items-center rounded-lg border border-[#DCE5DC] bg-white"
                        @class([
                            'opacity-100' => $diningTableId,
                            'opacity-50' => !$diningTableId,
                        ])
                    >

                        <button
                            type="button"
                            wire:click="decreaseGuests"
                            @disabled(!$diningTableId)
                            class="flex h-8 w-8 items-center justify-center text-[#718076] transition hover:bg-[#F8FAF6] hover:text-[#294936] disabled:cursor-not-allowed disabled:hover:bg-white disabled:hover:text-[#718076]"
                        >
                            <x-tabler-minus class="h-3.5 w-3.5" />
                        </button>

                        <span class="flex h-8 min-w-8 items-center justify-center border-x border-[#DCE5DC] text-xs font-semibold text-[#294936]">
                            {{ $guestCount }}
                        </span>

                        <button
                            type="button"
                            wire:click="increaseGuests"
                            @disabled(!$diningTableId)
                            class="flex h-8 w-8 items-center justify-center text-[#718076] transition hover:bg-[#F8FAF6] hover:text-[#294936] disabled:cursor-not-allowed disabled:hover:bg-white disabled:hover:text-[#718076]"
                        >
                            <x-tabler-plus class="h-3.5 w-3.5" />
                        </button>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- ORDER ITEMS --}}
            {{-- ===================================================== --}}

            <div class="min-h-0 flex-1 overflow-y-auto">

                @if ($order && $order->items->isNotEmpty())

                    @foreach ($order->items as $item)

                        <div
                            wire:key="order-item-{{ $item->id }}"
                            class="border-b border-[#EEF2EE] px-5 py-4 sm:px-6"
                        >

                            <div class="flex items-start justify-between gap-4">

                                <div class="min-w-0">

                                    <p class="text-sm font-semibold text-[#294936]">
                                        {{ $item->menuItem->name }}
                                    </p>

                                    <p class="mt-1 text-xs text-[#8A968D]">
                                        {{ number_format($item->unit_price, 2) }} silver each
                                    </p>

                                </div>

                                <p class="shrink-0 text-sm font-bold text-[#294936]">
                                    {{ number_format($item->subtotal, 2) }}

                                    <span class="text-[10px] font-medium text-[#8A968D]">
                                        silver
                                    </span>
                                </p>

                            </div>


                            <div class="mt-3 flex items-center justify-between">

                                <button
                                    type="button"
                                    wire:click="removeFromOrder({{ $item->id }})"
                                    class="text-xs font-medium text-[#8A968D] transition hover:text-[#B94A48]"
                                >
                                    Remove
                                </button>


                                <div class="flex items-center rounded-lg border border-[#DCE5DC]">

                                    <button
                                        type="button"
                                        wire:click="decreaseQuantity({{ $item->id }})"
                                        class="flex h-8 w-8 items-center justify-center text-[#718076] transition hover:bg-[#F8FAF6] hover:text-[#294936]"
                                    >
                                        <x-tabler-minus class="h-3.5 w-3.5" />
                                    </button>

                                    <span class="flex h-8 min-w-9 items-center justify-center border-x border-[#DCE5DC] text-xs font-bold text-[#294936]">
                                        {{ $item->quantity }}
                                    </span>

                                    <button
                                        type="button"
                                        wire:click="increaseQuantity({{ $item->id }})"
                                        class="flex h-8 w-8 items-center justify-center text-[#718076] transition hover:bg-[#F8FAF6] hover:text-[#294936]"
                                    >
                                        <x-tabler-plus class="h-3.5 w-3.5" />
                                    </button>

                                </div>

                            </div>

                        </div>

                    @endforeach

                @else

                    <div class="flex min-h-[360px] flex-col items-center justify-center px-8 text-center">

                        <div
                            @class([
                                'flex h-16 w-16 items-center justify-center rounded-2xl',
                                'bg-[#E8F0E5]' => $diningTableId,
                                'bg-[#F1F3F1]' => !$diningTableId,
                            ])
                        >

                            @if ($diningTableId)

                                <x-tabler-shopping-bag class="h-7 w-7 text-[#5E8067]" />

                            @else

                                <x-tabler-lock class="h-7 w-7 text-[#A1ACA3]" />

                            @endif

                        </div>

                        <h3 class="mt-5 font-semibold text-[#294936]">

                            @if ($diningTableId)
                                Your order is empty
                            @else
                                No table selected
                            @endif

                        </h3>

                        <p class="mt-2 max-w-xs text-xs leading-5 text-[#8A968D]">

                            @if ($diningTableId)
                                Choose dishes from the menu to begin this table's order.
                            @else
                                Select a dining table to begin an order.
                            @endif

                        </p>

                        @if (!$diningTableId)

                            <a
                                href="{{ route('tables') }}"
                                class="mt-5 inline-flex items-center gap-2 rounded-lg bg-[#294936] px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-[#183524]"
                            >
                                Choose table

                                <x-tabler-arrow-right class="h-3.5 w-3.5" />
                            </a>

                        @endif

                    </div>

                @endif

            </div>


            {{-- ===================================================== --}}
            {{-- PAYMENT --}}
            {{-- ===================================================== --}}

            <div class="shrink-0 border-t border-[#DCE5DC] bg-white p-5 sm:p-6">

                @php
                    $subtotal = (float) ($order?->subtotal ?? 0);
                    $serviceCharge = (float) ($order?->service_charge ?? 0);
                    $tax = (float) ($order?->tax ?? 0);
                    $total = (float) ($order?->total ?? 0);
                    $itemCount = $order?->items->sum('quantity') ?? 0;
                @endphp


                {{-- Totals --}}

                <div
                    @class([
                        'space-y-2.5 transition',
                        'opacity-100' => $diningTableId,
                        'opacity-50' => !$diningTableId,
                    ])
                >

                    <div class="flex items-center justify-between text-sm">

                        <span class="text-[#718076]">
                            Subtotal
                        </span>

                        <span class="font-medium text-[#294936]">
                            {{ number_format($subtotal, 2) }} silver
                        </span>

                    </div>


                    <div class="flex items-center justify-between text-sm">

                        <span class="text-[#718076]">
                            Service charge

                            <span class="text-[10px] text-[#A1ACA3]">
                                (10%)
                            </span>
                        </span>

                        <span class="font-medium text-[#294936]">
                            {{ number_format($serviceCharge, 2) }} silver
                        </span>

                    </div>


                    <div class="flex items-center justify-between text-sm">

                        <span class="text-[#718076]">
                            Tax

                            <span class="text-[10px] text-[#A1ACA3]">
                                (10%)
                            </span>
                        </span>

                        <span class="font-medium text-[#294936]">
                            {{ number_format($tax, 2) }} silver
                        </span>

                    </div>

                </div>


                <div class="my-5 h-px bg-[#DCE5DC]"></div>


                {{-- Total --}}

                <div class="flex items-end justify-between">

                    <div>

                        <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#8FA58B]">
                            Total
                        </p>

                        <p class="mt-1 text-2xl font-bold tracking-tight text-[#183524]">
                            {{ number_format($total, 2) }}

                            <span class="text-sm font-semibold text-[#718076]">
                                silver
                            </span>
                        </p>

                    </div>

                    <span class="text-xs text-[#8A968D]">
                        {{ $itemCount }}
                        {{ Str::plural('item', $itemCount) }}
                    </span>

                </div>


                {{-- ================================================= --}}
                {{-- PAYMENT METHOD --}}
                {{-- ================================================= --}}

                <div
                    class="relative mt-5"
                >

                    <div
                        @class([
                            'grid grid-cols-2 gap-2.5 transition',
                            'opacity-100' => $diningTableId,
                            'opacity-50' => !$diningTableId,
                        ])
                    >

                        <button
                            type="button"
                            wire:click="selectPaymentMethod('cash')"
                            @disabled(!$diningTableId)
                            @class([
                                'flex items-center justify-center gap-2 rounded-xl border px-4 py-3 text-sm font-semibold transition',
                                'border-[#294936] bg-[#E8F0E5] text-[#294936]' => $paymentMethod === 'cash' && $diningTableId,
                                'border-[#DCE5DC] text-[#718076] hover:bg-[#F8FAF6] hover:text-[#294936]' => $paymentMethod !== 'cash' && $diningTableId,
                                'cursor-not-allowed' => !$diningTableId,
                            ])
                        >
                            <x-tabler-cash class="h-4 w-4" />
                            Cash
                        </button>


                        <button
                            type="button"
                            wire:click="selectPaymentMethod('card')"
                            @disabled(!$diningTableId)
                            @class([
                                'flex items-center justify-center gap-2 rounded-xl border px-4 py-3 text-sm font-semibold transition',
                                'border-[#294936] bg-[#E8F0E5] text-[#294936]' => $paymentMethod === 'card' && $diningTableId,
                                'border-[#DCE5DC] text-[#718076] hover:bg-[#F8FAF6] hover:text-[#294936]' => $paymentMethod !== 'card' && $diningTableId,
                                'cursor-not-allowed' => !$diningTableId,
                            ])
                        >
                            <x-tabler-credit-card class="h-4 w-4" />
                            Card
                        </button>

                    </div>

                    @if (!$diningTableId)

                        <div class="absolute inset-0 flex items-center justify-center rounded-xl bg-white/30 backdrop-blur-[1px]">

                            <div class="flex items-center gap-2 rounded-lg border border-[#E5DCC8] bg-[#FBF7EE] px-3 py-2 text-[11px] font-semibold text-[#5E4A2F] shadow-sm">

                                <x-tabler-lock class="h-3.5 w-3.5 text-[#9A7B45]" />

                                Select a table first

                            </div>

                        </div>

                    @endif

                </div>


                {{-- ================================================= --}}
                {{-- CHARGE --}}
                {{-- ================================================= --}}

                <div class="relative">

                    <button
                        type="button"
                        wire:click="charge"
                        wire:loading.attr="disabled"
                        wire:target="charge"
                        @disabled(!$diningTableId || !$order || $order->items->isEmpty())
                        class="mt-3 flex w-full items-center justify-center gap-2 rounded-xl bg-[#294936] px-5 py-4 text-sm font-bold text-white shadow-sm transition hover:bg-[#183524] disabled:cursor-not-allowed disabled:bg-[#B9C5BA]"
                    >

                        <span wire:loading.remove wire:target="charge">
                            @if ($diningTableId && $order && $order->items->isNotEmpty())
                                Charge {{ number_format($total, 2) }} silver
                            @else
                                Select a table
                            @endif
                        </span>

                        <span wire:loading wire:target="charge" class="flex items-center gap-2">

                            <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none">

                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>

                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                                ></path>

                            </svg>

                            Processing...

                        </span>

                        @if ($diningTableId && $order && $order->items->isNotEmpty())

                            <x-tabler-arrow-right
                                wire:loading.remove
                                wire:target="charge"
                                class="h-4 w-4"
                            />

                        @endif

                    </button>

                </div>


                {{-- ================================================= --}}
                {{-- TABLE ACTION --}}
                {{-- ================================================= --}}

                @if (!$diningTableId)

                    <a
                        href="{{ route('tables') }}"
                        class="mt-3 flex w-full items-center justify-center gap-2 rounded-xl border border-[#DCE5DC] bg-white px-5 py-3 text-xs font-semibold text-[#294936] transition hover:bg-[#F8FAF6]"
                    >
                        <x-tabler-armchair-2 class="h-4 w-4" />

                        Choose a dining table
                    </a>

                @endif

            </div>

        </aside>

    </div>


    {{-- ============================================================= --}}
    {{-- FLASH MESSAGE --}}
    {{-- ============================================================= --}}

    @if (session()->has('success'))

        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 3500)"
            x-show="show"
            x-transition
            class="fixed bottom-5 right-5 z-50 flex items-center gap-3 rounded-xl border border-[#CFE0D1] bg-white px-4 py-3 text-sm font-medium text-[#294936] shadow-lg"
        >

            <div class="flex h-7 w-7 items-center justify-center rounded-full bg-[#E8F0E5]">

                <x-tabler-check class="h-4 w-4 text-[#5E8067]" />

            </div>

            {{ session('success') }}

        </div>

    @endif

</div>
