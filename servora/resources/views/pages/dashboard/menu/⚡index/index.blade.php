{{-- menu/⚡index/index.blade.php --}}

<div class="space-y-8">

    {{-- =========================================================
        HEADER / MENU STUDIO
    ========================================================== --}}
    <div class="relative overflow-hidden rounded-3xl border border-[#DCE5DC] bg-[#F8FAF6]">

        {{-- Decorative background --}}
        <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[#E8F0E5] opacity-70 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-32 left-1/3 h-64 w-64 rounded-full bg-[#F1E9DF] opacity-60 blur-3xl"></div>

        <div class="relative p-6 sm:p-8">

            {{-- Breadcrumb --}}
            <div class="mb-6 flex items-center gap-2 text-xs font-medium uppercase tracking-[0.12em] text-[#8A958D]">
                <span>Manage</span>
                <x-tabler-chevron-right class="h-3.5 w-3.5" />
                <span class="text-[#294936]">Menu Studio</span>
            </div>

            <div class="flex flex-col gap-7 xl:flex-row xl:items-end xl:justify-between">

                <div class="max-w-2xl">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#294936] text-white shadow-sm">
                            <x-tabler-tools-kitchen-2 class="h-5 w-5" />
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.14em] text-[#718076]">
                                Restaurant Operations
                            </p>

                            <h1 class="mt-0.5 text-2xl font-semibold tracking-tight text-[#26342A] sm:text-3xl">
                                Menu Studio
                            </h1>
                        </div>

                    </div>

                    <p class="mt-4 max-w-xl text-sm leading-6 text-[#718076]">
                        Shape what your guests see and order. Manage menus,
                        dishes, categories, modifiers, ingredients, and availability
                        from one workspace.
                    </p>

                </div>

                <div class="flex flex-wrap items-center gap-3">

                    <button
                        type="button"
                        class="inline-flex items-center gap-2 rounded-xl border border-[#DCE5DC] bg-white px-4 py-2.5 text-sm font-medium text-[#294936] shadow-sm transition hover:bg-[#F8FAF6]"
                    >
                        <x-tabler-eye class="h-4 w-4" />
                        Preview
                    </button>

                    <button
                        type="button"
                        wire:click="createItem"
                        class="inline-flex items-center gap-2 rounded-xl bg-[#294936] px-4 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-[#183524]"
                    >
                        <x-tabler-plus class="h-4 w-4" />
                        Add menu item
                    </button>

                </div>

            </div>

            {{-- Quick status --}}
            <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3 border-t border-[#DCE5DC] pt-5">

                <div class="flex items-center gap-2 text-sm text-[#718076]">
                    <span class="h-2 w-2 rounded-full bg-[#5E8067]"></span>
                    <span>
                        <strong class="font-semibold text-[#26342A]">2</strong>
                        menus live
                    </span>
                </div>

                <div class="h-4 w-px bg-[#DCE5DC]"></div>

                <div class="text-sm text-[#718076]">
                    <strong class="font-semibold text-[#26342A]">43</strong>
                    available dishes
                </div>

                <div class="h-4 w-px bg-[#DCE5DC]"></div>

                <div class="text-sm text-[#718076]">
                    <strong class="font-semibold text-[#26342A]">5</strong>
                    need attention
                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        WORKSPACE NAVIGATION
    ========================================================== --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div class="overflow-x-auto">
            <nav class="inline-flex min-w-max items-center gap-1 rounded-2xl border border-[#DCE5DC] bg-white p-1.5 shadow-sm">

                @foreach ([
                    'Menus' => 'notebook',
                    'Categories' => 'category',
                    'Items' => 'tools-kitchen-2',
                    'Modifiers' => 'adjustments-horizontal',
                    'Ingredients' => 'carrot',
                    'Availability' => 'calendar-check',
                ] as $item => $icon)

                    <button
                        type="button"
                        wire:click="setView('{{ $item }}')"
                        class="inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-medium transition
                            {{ $view === $item
                                ? 'bg-[#294936] text-white shadow-sm'
                                : 'text-[#718076] hover:bg-[#F8FAF6] hover:text-[#294936]' }}"
                    >

                        @switch($icon)

                            @case('notebook')
                                <x-tabler-notebook class="h-4 w-4" />
                                @break

                            @case('category')
                                <x-tabler-category class="h-4 w-4" />
                                @break

                            @case('tools-kitchen-2')
                                <x-tabler-tools-kitchen-2 class="h-4 w-4" />
                                @break

                            @case('adjustments-horizontal')
                                <x-tabler-adjustments-horizontal class="h-4 w-4" />
                                @break

                            @case('carrot')
                                <x-tabler-carrot class="h-4 w-4" />
                                @break

                            @case('calendar-check')
                                <x-tabler-calendar-check class="h-4 w-4" />
                                @break

                        @endswitch

                        {{ $item }}

                    </button>

                @endforeach

            </nav>
        </div>

        @if ($view === 'Menus')

            <div class="hidden items-center gap-2 text-xs text-[#8A958D] sm:flex">
                <x-tabler-refresh class="h-4 w-4" />
                <span>Menu data synced</span>
            </div>

        @endif

    </div>


    {{-- =========================================================
        MENU VIEW
    ========================================================== --}}
    @if ($view === 'Menus')

        {{-- Overview strip --}}
        <div class="grid gap-4 sm:grid-cols-3">

            <div class="rounded-2xl border border-[#DCE5DC] bg-white p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                            Published menus
                        </p>

                        <p class="mt-2 text-2xl font-semibold tracking-tight text-[#26342A]">
                            2
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F0E5] text-[#294936]">
                        <x-tabler-world-check class="h-5 w-5" />
                    </div>

                </div>

                <p class="mt-3 text-xs text-[#718076]">
                    Currently visible to guests
                </p>

            </div>


            <div class="rounded-2xl border border-[#DCE5DC] bg-white p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                            Menu items
                        </p>

                        <p class="mt-2 text-2xl font-semibold tracking-tight text-[#26342A]">
                            48
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F1E9DF] text-[#7D6048]">
                        <x-tabler-tools-kitchen-2 class="h-5 w-5" />
                    </div>

                </div>

                <p class="mt-3 text-xs text-[#718076]">
                    43 available for ordering
                </p>

            </div>


            <div class="rounded-2xl border border-[#DCE5DC] bg-white p-5">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                            Attention
                        </p>

                        <p class="mt-2 text-2xl font-semibold tracking-tight text-[#26342A]">
                            5
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FFF4DD] text-[#9A762B]">
                        <x-tabler-alert-triangle class="h-5 w-5" />
                    </div>

                </div>

                <p class="mt-3 text-xs text-[#718076]">
                    Items unavailable or low stock
                </p>

            </div>

        </div>


        {{-- =====================================================
            MENU WORKSPACE
        ====================================================== --}}
        <div class="grid gap-6 xl:grid-cols-[300px_minmax(0,1fr)]">

            {{-- =================================================
                MENU COLLECTION
            ================================================== --}}
            <aside class="h-fit overflow-hidden rounded-2xl border border-[#DCE5DC] bg-white">

                <div class="border-b border-[#DCE5DC] p-5">

                    <div class="flex items-start justify-between gap-4">

                        <div>
                            <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                                Your collection
                            </p>

                            <h2 class="mt-1 text-lg font-semibold text-[#26342A]">
                                Menus
                            </h2>
                        </div>

                        <button
                            type="button"
                            wire:click="createMenu"
                            class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#DCE5DC] text-[#294936] transition hover:bg-[#E8F0E5]"
                        >
                            <x-tabler-plus class="h-4 w-4" />
                        </button>

                    </div>

                </div>


                <div class="p-2">

                    @foreach ([
                        [
                            'name' => 'Tavern Menu',
                            'items' => 32,
                            'status' => 'Published',
                            'description' => 'Everyday dining'
                        ],
                        [
                            'name' => 'Royal Banquet Menu',
                            'items' => 18,
                            'status' => 'Published',
                            'description' => 'Formal dining'
                        ],
                        [
                            'name' => "Adventurer's Menu",
                            'items' => 14,
                            'status' => 'Draft',
                            'description' => 'Expedition meals'
                        ],
                        [
                            'name' => 'Festival Menu',
                            'items' => 21,
                            'status' => 'Scheduled',
                            'description' => 'Seasonal dishes'
                        ],
                    ] as $menu)

                        <button
                            type="button"
                            wire:click="selectMenu('{{ $menu['name'] }}')"
                            class="group w-full rounded-xl p-3 text-left transition
                                {{ $selectedMenu === $menu['name']
                                    ? 'bg-[#E8F0E5]'
                                    : 'hover:bg-[#F8FAF6]' }}"
                        >

                            <div class="flex gap-3">

                                <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-lg
                                    {{ $selectedMenu === $menu['name']
                                        ? 'bg-[#294936] text-white'
                                        : 'bg-[#F1F4F0] text-[#718076]' }}"
                                >
                                    <x-tabler-notebook class="h-4 w-4" />
                                </div>

                                <div class="min-w-0 flex-1">

                                    <div class="flex items-center justify-between gap-2">

                                        <p class="truncate text-sm font-medium text-[#26342A]">
                                            {{ $menu['name'] }}
                                        </p>

                                        @if ($menu['status'] === 'Published')
                                            <span class="h-2 w-2 shrink-0 rounded-full bg-[#5E8067]"></span>
                                        @elseif ($menu['status'] === 'Scheduled')
                                            <span class="h-2 w-2 shrink-0 rounded-full bg-[#9A762B]"></span>
                                        @else
                                            <span class="h-2 w-2 shrink-0 rounded-full bg-[#A8B0AA]"></span>
                                        @endif

                                    </div>

                                    <p class="mt-0.5 text-xs text-[#8A958D]">
                                        {{ $menu['description'] }}
                                    </p>

                                    <div class="mt-2 flex items-center gap-2 text-[11px] text-[#718076]">
                                        <span>{{ $menu['items'] }} items</span>
                                        <span>·</span>
                                        <span>{{ $menu['status'] }}</span>
                                    </div>

                                </div>

                            </div>

                        </button>

                    @endforeach

                </div>


                <div class="border-t border-[#DCE5DC] p-3">

                    <button
                        type="button"
                        class="flex w-full items-center justify-between rounded-xl px-3 py-2.5 text-sm font-medium text-[#718076] transition hover:bg-[#F8FAF6] hover:text-[#294936]"
                    >

                        <span class="flex items-center gap-2">
                            <x-tabler-settings class="h-4 w-4" />
                            Menu settings
                        </span>

                        <x-tabler-chevron-right class="h-4 w-4" />

                    </button>

                </div>

            </aside>


            {{-- =================================================
                SELECTED MENU
            ================================================== --}}
            <section class="min-w-0 overflow-hidden rounded-2xl border border-[#DCE5DC] bg-white">

                {{-- Menu identity --}}
                <div class="border-b border-[#DCE5DC] p-6 sm:p-7">

                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">

                        <div class="min-w-0">

                            <div class="flex flex-wrap items-center gap-2">

                                <h2 class="text-2xl font-semibold tracking-tight text-[#26342A]">
                                    {{ $selectedMenu }}
                                </h2>

                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#E8F0E5] px-2.5 py-1 text-[11px] font-semibold text-[#5E8067]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#5E8067]"></span>
                                    Published
                                </span>

                            </div>

                            <p class="mt-2 max-w-2xl text-sm leading-6 text-[#718076]">
                                Servora's everyday dining menu, available across
                                the Royal Dining Hall during regular service.
                            </p>

                            <div class="mt-4 flex flex-wrap items-center gap-x-5 gap-y-2 text-xs text-[#8A958D]">

                                <span class="inline-flex items-center gap-1.5">
                                    <x-tabler-tools-kitchen-2 class="h-3.5 w-3.5" />
                                    32 items
                                </span>

                                <span class="inline-flex items-center gap-1.5">
                                    <x-tabler-category class="h-3.5 w-3.5" />
                                    7 categories
                                </span>

                                <span class="inline-flex items-center gap-1.5">
                                    <x-tabler-clock class="h-3.5 w-3.5" />
                                    Updated today
                                </span>

                            </div>

                        </div>


                        <div class="flex shrink-0 items-center gap-2">

                            <button
                                type="button"
                                class="inline-flex items-center gap-2 rounded-xl border border-[#DCE5DC] px-4 py-2.5 text-sm font-medium text-[#294936] transition hover:bg-[#F8FAF6]"
                            >
                                <x-tabler-pencil class="h-4 w-4" />
                                Edit
                            </button>

                            <button
                                type="button"
                                class="flex h-10 w-10 items-center justify-center rounded-xl border border-[#DCE5DC] text-[#718076] transition hover:bg-[#F8FAF6] hover:text-[#294936]"
                            >
                                <x-tabler-dots class="h-5 w-5" />
                            </button>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    CATEGORY MAP
                ================================================== --}}
                <div class="border-b border-[#DCE5DC] bg-[#FCFDFC] px-6 pt-5 sm:px-7">

                    <div class="mb-3 flex items-center justify-between">

                        <div>
                            <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                                Menu sections
                            </p>
                        </div>

                        <button
                            type="button"
                            class="hidden items-center gap-1.5 text-xs font-medium text-[#294936] sm:flex"
                        >
                            <x-tabler-plus class="h-3.5 w-3.5" />
                            Add section
                        </button>

                    </div>


                    <div class="flex gap-2 overflow-x-auto pb-5">

                        @foreach ([
                            'Starters',
                            'Soups & Stews',
                            'Salads',
                            'Main Courses',
                            'Sides',
                            'Desserts',
                            'Beverages',
                        ] as $category)

                            <button
                                type="button"
                                wire:click="selectCategory('{{ $category }}')"
                                class="group shrink-0 rounded-xl border px-4 py-2.5 text-left transition
                                    {{ $selectedCategory === $category
                                        ? 'border-[#294936] bg-[#294936] text-white'
                                        : 'border-[#DCE5DC] bg-white text-[#718076] hover:border-[#C8D5C9] hover:bg-[#F8FAF6]' }}"
                            >

                                <div class="flex items-center gap-2">

                                    <span class="text-sm font-medium">
                                        {{ $category }}
                                    </span>

                                    @if ($selectedCategory === $category)
                                        <x-tabler-chevron-down class="h-3.5 w-3.5 opacity-70" />
                                    @endif

                                </div>

                            </button>

                        @endforeach

                    </div>

                </div>


                {{-- =================================================
                    DISH LIST
                ================================================== --}}
                <div class="p-6 sm:p-7">

                    <div class="mb-6 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">

                        <div>

                            <div class="flex items-center gap-3">

                                <h3 class="text-lg font-semibold text-[#26342A]">
                                    {{ $selectedCategory }}
                                </h3>

                                <span class="rounded-full bg-[#F1F4F0] px-2 py-0.5 text-[11px] font-medium text-[#718076]">
                                    6 dishes
                                </span>

                            </div>

                            <p class="mt-1 text-sm text-[#8A958D]">
                                Items currently assigned to this section.
                            </p>

                        </div>


                        <div class="flex items-center gap-2">

                            <div class="relative w-full sm:w-60">

                                <x-tabler-search class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#9AA69D]" />

                                <input
                                    type="text"
                                    wire:model.live="search"
                                    placeholder="Search dishes..."
                                    class="w-full rounded-xl border border-[#DCE5DC] bg-[#F8FAF6] py-2.5 pl-9 pr-3 text-sm outline-none placeholder:text-[#9AA69D] focus:border-[#8FA58B] focus:ring-2 focus:ring-[#E8F0E5]"
                                />

                            </div>

                            <button
                                type="button"
                                wire:click="createItem"
                                class="hidden h-10 shrink-0 items-center gap-2 rounded-xl bg-[#294936] px-3.5 text-sm font-medium text-white transition hover:bg-[#183524] sm:inline-flex"
                            >
                                <x-tabler-plus class="h-4 w-4" />
                                Add
                            </button>

                        </div>

                    </div>


                    {{-- Dish list --}}
                    <div class="space-y-2">

                        {{-- Dragonfire Roast --}}
                        <div class="group rounded-2xl border border-[#DCE5DC] p-4 transition hover:border-[#C8D5C9] hover:bg-[#FCFDFC]">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                                <div class="flex min-w-0 flex-1 items-center gap-4">

                                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#F1E9DF] text-[#7D6048]">
                                        <x-tabler-meat class="h-6 w-6" />
                                    </div>

                                    <div class="min-w-0">

                                        <div class="flex flex-wrap items-center gap-2">

                                            <h4 class="font-semibold text-[#26342A]">
                                                Dragonfire Roast
                                            </h4>

                                            <span class="rounded-full bg-[#E8F0E5] px-2 py-0.5 text-[10px] font-semibold text-[#5E8067]">
                                                Available
                                            </span>

                                        </div>

                                        <p class="mt-1 max-w-xl truncate text-sm text-[#718076]">
                                            Ember-drake ribs, charred root vegetables,
                                            and fireberry glaze.
                                        </p>

                                        <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] text-[#8A958D]">

                                            <span class="inline-flex items-center gap-1">
                                                <x-tabler-clock class="h-3.5 w-3.5" />
                                                28 min
                                            </span>

                                            <span>820 cal</span>

                                            <span>8 ingredients</span>

                                        </div>

                                    </div>

                                </div>


                                <div class="flex items-center justify-between gap-4 sm:justify-end">

                                    <div class="text-right">

                                        <p class="font-semibold text-[#294936]">
                                            18 silver
                                        </p>

                                        <p class="mt-0.5 text-[11px] text-[#8A958D]">
                                            Main Course
                                        </p>

                                    </div>

                                    <button
                                        type="button"
                                        class="flex h-9 w-9 items-center justify-center rounded-lg text-[#8A958D] transition hover:bg-[#E8F0E5] hover:text-[#294936]"
                                    >
                                        <x-tabler-dots class="h-5 w-5" />
                                    </button>

                                </div>

                            </div>

                        </div>


                        {{-- Hunter's Feast --}}
                        <div class="group rounded-2xl border border-[#DCE5DC] p-4 transition hover:border-[#C8D5C9] hover:bg-[#FCFDFC]">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                                <div class="flex min-w-0 flex-1 items-center gap-4">

                                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#E8F0E5] text-[#5E8067]">
                                        <x-tabler-tools-kitchen-2 class="h-6 w-6" />
                                    </div>

                                    <div class="min-w-0">

                                        <div class="flex flex-wrap items-center gap-2">

                                            <h4 class="font-semibold text-[#26342A]">
                                                Hunter's Feast
                                            </h4>

                                            <span class="rounded-full bg-[#E8F0E5] px-2 py-0.5 text-[10px] font-semibold text-[#5E8067]">
                                                Available
                                            </span>

                                        </div>

                                        <p class="mt-1 max-w-xl truncate text-sm text-[#718076]">
                                            Roasted venison, wild mushrooms,
                                            buttered potatoes and hunter's gravy.
                                        </p>

                                        <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] text-[#8A958D]">

                                            <span class="inline-flex items-center gap-1">
                                                <x-tabler-clock class="h-3.5 w-3.5" />
                                                24 min
                                            </span>

                                            <span>680 cal</span>

                                            <span>7 ingredients</span>

                                        </div>

                                    </div>

                                </div>


                                <div class="flex items-center justify-between gap-4 sm:justify-end">

                                    <div class="text-right">

                                        <p class="font-semibold text-[#294936]">
                                            14 silver
                                        </p>

                                        <p class="mt-0.5 text-[11px] text-[#8A958D]">
                                            Main Course
                                        </p>

                                    </div>

                                    <button
                                        type="button"
                                        class="flex h-9 w-9 items-center justify-center rounded-lg text-[#8A958D] transition hover:bg-[#E8F0E5] hover:text-[#294936]"
                                    >
                                        <x-tabler-dots class="h-5 w-5" />
                                    </button>

                                </div>

                            </div>

                        </div>


                        {{-- Moonroot Stew --}}
                        <div class="group rounded-2xl border border-[#E9DCC4] bg-[#FFFDF8] p-4 transition hover:border-[#DCCAA9]">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                                <div class="flex min-w-0 flex-1 items-center gap-4">

                                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#FFF4DD] text-[#9A762B]">
                                        <x-tabler-bowl-spoon class="h-6 w-6" />
                                    </div>

                                    <div class="min-w-0">

                                        <div class="flex flex-wrap items-center gap-2">

                                            <h4 class="font-semibold text-[#26342A]">
                                                Moonroot Stew
                                            </h4>

                                            <span class="rounded-full bg-[#FFF4DD] px-2 py-0.5 text-[10px] font-semibold text-[#9A762B]">
                                                Low stock
                                            </span>

                                        </div>

                                        <p class="mt-1 max-w-xl truncate text-sm text-[#718076]">
                                            Moonroot, mountain carrots, onions
                                            and slow-cooked beef.
                                        </p>

                                        <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] text-[#8A958D]">

                                            <span class="inline-flex items-center gap-1">
                                                <x-tabler-clock class="h-3.5 w-3.5" />
                                                32 min
                                            </span>

                                            <span>540 cal</span>

                                            <span>6 ingredients</span>

                                        </div>

                                    </div>

                                </div>


                                <div class="flex items-center justify-between gap-4 sm:justify-end">

                                    <div class="text-right">

                                        <p class="font-semibold text-[#294936]">
                                            9 silver
                                        </p>

                                        <p class="mt-0.5 text-[11px] text-[#8A958D]">
                                            Main Course
                                        </p>

                                    </div>

                                    <button
                                        type="button"
                                        class="flex h-9 w-9 items-center justify-center rounded-lg text-[#8A958D] transition hover:bg-[#E8F0E5] hover:text-[#294936]"
                                    >
                                        <x-tabler-dots class="h-5 w-5" />
                                    </button>

                                </div>

                            </div>

                        </div>


                        {{-- Charred Root Vegetables --}}
                        <div class="group rounded-2xl border border-[#DCE5DC] p-4 transition hover:border-[#C8D5C9] hover:bg-[#FCFDFC]">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                                <div class="flex min-w-0 flex-1 items-center gap-4">

                                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-[#F1F4F0] text-[#718076]">
                                        <x-tabler-carrot class="h-6 w-6" />
                                    </div>

                                    <div class="min-w-0">

                                        <div class="flex flex-wrap items-center gap-2">

                                            <h4 class="font-semibold text-[#26342A]">
                                                Charred Root Vegetables
                                            </h4>

                                            <span class="rounded-full bg-[#E8F0E5] px-2 py-0.5 text-[10px] font-semibold text-[#5E8067]">
                                                Available
                                            </span>

                                        </div>

                                        <p class="mt-1 max-w-xl truncate text-sm text-[#718076]">
                                            Seasonal roots roasted over the hearth
                                            with herb butter.
                                        </p>

                                        <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-[11px] text-[#8A958D]">

                                            <span class="inline-flex items-center gap-1">
                                                <x-tabler-clock class="h-3.5 w-3.5" />
                                                14 min
                                            </span>

                                            <span>280 cal</span>

                                            <span>5 ingredients</span>

                                        </div>

                                    </div>

                                </div>


                                <div class="flex items-center justify-between gap-4 sm:justify-end">

                                    <div class="text-right">

                                        <p class="font-semibold text-[#294936]">
                                            6 silver
                                        </p>

                                        <p class="mt-0.5 text-[11px] text-[#8A958D]">
                                            Side
                                        </p>

                                    </div>

                                    <button
                                        type="button"
                                        class="flex h-9 w-9 items-center justify-center rounded-lg text-[#8A958D] transition hover:bg-[#E8F0E5] hover:text-[#294936]"
                                    >
                                        <x-tabler-dots class="h-5 w-5" />
                                    </button>

                                </div>

                            </div>

                        </div>


                        {{-- Add item --}}
                        <button
                            type="button"
                            wire:click="createItem"
                            class="group flex w-full items-center justify-center gap-2 rounded-2xl border border-dashed border-[#C8D5C9] py-4 text-sm font-medium text-[#718076] transition hover:border-[#8FA58B] hover:bg-[#F8FAF6] hover:text-[#294936]"
                        >
                            <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#F1F4F0] transition group-hover:bg-[#E8F0E5]">
                                <x-tabler-plus class="h-4 w-4" />
                            </span>

                            Add dish to {{ $selectedCategory }}
                        </button>

                    </div>

                </div>

            </section>

        </div>


    @else

    {{-- =========================================================
        CATEGORIES
    ========================================================== --}}
    @if ($view === 'Categories')

        <div class="space-y-6">

            {{-- Header --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>
                    <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                        Menu structure
                    </p>

                    <h2 class="mt-1 text-xl font-semibold text-[#26342A]">
                        Categories
                    </h2>

                    <p class="mt-1 text-sm text-[#718076]">
                        Organize dishes into sections guests can easily browse.
                    </p>
                </div>

                <button
                    type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#294936] px-4 py-2.5 text-sm font-medium text-white transition hover:bg-[#183524]"
                >
                    <x-tabler-plus class="h-4 w-4" />
                    Add category
                </button>

            </div>


            {{-- Category grid --}}
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">

                @foreach ([
                    ['name' => 'Starters', 'items' => 5, 'description' => 'Small plates and opening dishes', 'icon' => 'salad'],
                    ['name' => 'Soups & Stews', 'items' => 4, 'description' => 'Hearty bowls prepared over the hearth', 'icon' => 'bowl-spoon'],
                    ['name' => 'Salads', 'items' => 3, 'description' => 'Fresh greens, herbs and seasonal produce', 'icon' => 'salad'],
                    ['name' => 'Main Courses', 'items' => 9, 'description' => 'The heart of the dining menu', 'icon' => 'meat'],
                    ['name' => 'Sides', 'items' => 6, 'description' => 'Accompaniments and shared plates', 'icon' => 'tools-kitchen-2'],
                    ['name' => 'Desserts', 'items' => 5, 'description' => 'Sweet dishes and after-dinner treats', 'icon' => 'cake'],
                    ['name' => 'Beverages', 'items' => 8, 'description' => 'Ales, wines, teas and house drinks', 'icon' => 'glass'],
                ] as $category)

                    <div class="group rounded-2xl border border-[#DCE5DC] bg-white p-5 transition hover:border-[#C8D5C9] hover:shadow-sm">

                        <div class="flex items-start justify-between">

                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F0E5] text-[#294936]">

                                @switch($category['icon'])

                                    @case('salad')
                                        <x-tabler-salad class="h-5 w-5" />
                                        @break

                                    @case('bowl-spoon')
                                        <x-tabler-bowl-spoon class="h-5 w-5" />
                                        @break

                                    @case('meat')
                                        <x-tabler-meat class="h-5 w-5" />
                                        @break

                                    @case('tools-kitchen-2')
                                        <x-tabler-tools-kitchen-2 class="h-5 w-5" />
                                        @break

                                    @case('cake')
                                        <x-tabler-cake class="h-5 w-5" />
                                        @break

                                    @case('glass')
                                        <x-tabler-glass class="h-5 w-5" />
                                        @break

                                @endswitch

                            </div>

                            <button class="flex h-8 w-8 items-center justify-center rounded-lg text-[#8A958D] hover:bg-[#F1F4F0] hover:text-[#294936]">
                                <x-tabler-dots class="h-4 w-4" />
                            </button>

                        </div>

                        <h3 class="mt-5 font-semibold text-[#26342A]">
                            {{ $category['name'] }}
                        </h3>

                        <p class="mt-1 text-sm leading-5 text-[#718076]">
                            {{ $category['description'] }}
                        </p>

                        <div class="mt-5 flex items-center justify-between border-t border-[#EDF0EC] pt-4">

                            <span class="text-xs text-[#8A958D]">
                                {{ $category['items'] }} menu items
                            </span>

                            <button class="text-xs font-medium text-[#294936]">
                                View items →
                            </button>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>


    {{-- =========================================================
        ITEMS
    ========================================================== --}}
    @elseif ($view === 'Items')

        <div class="space-y-6">

            <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">

                <div>
                    <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                        Dish catalog
                    </p>

                    <h2 class="mt-1 text-xl font-semibold text-[#26342A]">
                        Menu Items
                    </h2>

                    <p class="mt-1 text-sm text-[#718076]">
                        Manage every dish, drink and offering available across your menus.
                    </p>
                </div>

                <button
                    type="button"
                    wire:click="createItem"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#294936] px-4 py-2.5 text-sm font-medium text-white"
                >
                    <x-tabler-plus class="h-4 w-4" />
                    Add menu item
                </button>

            </div>


            {{-- Filters --}}
            <div class="flex flex-col gap-3 rounded-2xl border border-[#DCE5DC] bg-white p-4 sm:flex-row">

                <div class="relative flex-1">

                    <x-tabler-search class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[#9AA69D]" />

                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Search dishes..."
                        class="w-full rounded-xl border border-[#DCE5DC] bg-[#F8FAF6] py-2.5 pl-9 pr-3 text-sm outline-none focus:border-[#8FA58B] focus:ring-2 focus:ring-[#E8F0E5]"
                    />

                </div>

                <button class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#DCE5DC] px-4 py-2.5 text-sm text-[#718076] hover:bg-[#F8FAF6]">
                    <x-tabler-filter class="h-4 w-4" />
                    Filter
                </button>

            </div>


            {{-- Items --}}
            <div class="overflow-hidden rounded-2xl border border-[#DCE5DC] bg-white">

                <div class="hidden border-b border-[#DCE5DC] bg-[#F8FAF6] px-5 py-3 text-[11px] font-semibold uppercase tracking-[0.08em] text-[#8A958D] md:grid md:grid-cols-[1fr_150px_130px_80px] md:gap-4">
                    <span>Item</span>
                    <span>Category</span>
                    <span>Price</span>
                    <span></span>
                </div>

                <div class="divide-y divide-[#EDF0EC]">

                    @foreach ([
                        ['name' => 'Dragonfire Roast', 'category' => 'Main Courses', 'price' => '18 silver', 'status' => 'Available', 'icon' => 'meat'],
                        ['name' => "Hunter's Feast", 'category' => 'Main Courses', 'price' => '14 silver', 'status' => 'Available', 'icon' => 'tools-kitchen-2'],
                        ['name' => 'Moonroot Stew', 'category' => 'Soups & Stews', 'price' => '9 silver', 'status' => 'Low Stock', 'icon' => 'bowl-spoon'],
                        ['name' => 'Charred Root Vegetables', 'category' => 'Sides', 'price' => '6 silver', 'status' => 'Available', 'icon' => 'carrot'],
                        ['name' => 'Fireberry Tart', 'category' => 'Desserts', 'price' => '8 silver', 'status' => 'Available', 'icon' => 'cake'],
                        ['name' => 'Moon Tea', 'category' => 'Beverages', 'price' => '4 silver', 'status' => 'Available', 'icon' => 'glass'],
                    ] as $item)

                        <div class="p-5 transition hover:bg-[#FCFDFC] md:grid md:grid-cols-[1fr_150px_130px_80px] md:items-center md:gap-4">

                            <div class="flex items-center gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#F1F4F0] text-[#718076]">

                                    @switch($item['icon'])
                                        @case('meat')
                                            <x-tabler-meat class="h-5 w-5" />
                                            @break
                                        @case('tools-kitchen-2')
                                            <x-tabler-tools-kitchen-2 class="h-5 w-5" />
                                            @break
                                        @case('bowl-spoon')
                                            <x-tabler-bowl-spoon class="h-5 w-5" />
                                            @break
                                        @case('carrot')
                                            <x-tabler-carrot class="h-5 w-5" />
                                            @break
                                        @case('cake')
                                            <x-tabler-cake class="h-5 w-5" />
                                            @break
                                        @case('glass')
                                            <x-tabler-glass class="h-5 w-5" />
                                            @break
                                    @endswitch

                                </div>

                                <div class="min-w-0">

                                    <div class="flex flex-wrap items-center gap-2">

                                        <p class="font-medium text-[#26342A]">
                                            {{ $item['name'] }}
                                        </p>

                                        <span class="rounded-full px-2 py-0.5 text-[10px] font-semibold
                                            {{ $item['status'] === 'Available'
                                                ? 'bg-[#E8F0E5] text-[#5E8067]'
                                                : 'bg-[#FFF4DD] text-[#9A762B]' }}"
                                        >
                                            {{ $item['status'] }}
                                        </span>

                                    </div>

                                    <p class="mt-1 text-xs text-[#8A958D] md:hidden">
                                        {{ $item['category'] }} · {{ $item['price'] }}
                                    </p>

                                </div>

                            </div>

                            <div class="mt-3 text-xs text-[#718076] md:mt-0">
                                {{ $item['category'] }}
                            </div>

                            <div class="mt-2 font-semibold text-[#294936] md:mt-0">
                                {{ $item['price'] }}
                            </div>

                            <button class="mt-3 flex h-8 w-8 items-center justify-center rounded-lg text-[#8A958D] hover:bg-[#E8F0E5] hover:text-[#294936] md:mt-0">
                                <x-tabler-dots class="h-4 w-4" />
                            </button>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>


    {{-- =========================================================
        MODIFIERS
    ========================================================== --}}
    @elseif ($view === 'Modifiers')

        <div class="space-y-6">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>
                    <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                        Guest customization
                    </p>

                    <h2 class="mt-1 text-xl font-semibold text-[#26342A]">
                        Modifiers
                    </h2>

                    <p class="mt-1 text-sm text-[#718076]">
                        Give guests choices without creating separate menu items.
                    </p>
                </div>

                <button class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#294936] px-4 py-2.5 text-sm font-medium text-white">
                    <x-tabler-plus class="h-4 w-4" />
                    Add modifier
                </button>

            </div>


            <div class="grid gap-4 lg:grid-cols-2">

                @foreach ([
                    [
                        'name' => 'Cooking Preference',
                        'type' => 'Single choice',
                        'items' => ['Rare', 'Medium', 'Well Done'],
                        'used' => 'Dragonfire Roast, Hunter\'s Feast'
                    ],
                    [
                        'name' => 'Choose Your Side',
                        'type' => 'Single choice',
                        'items' => ['Charred Roots', 'Buttered Potatoes', 'Wild Rice'],
                        'used' => 'Hunter\'s Feast'
                    ],
                    [
                        'name' => 'Extra Toppings',
                        'type' => 'Multiple choice',
                        'items' => ['Fireberry Glaze', 'Wild Mushrooms', 'Herb Butter'],
                        'used' => 'Main Courses'
                    ],
                    [
                        'name' => 'Drink Size',
                        'type' => 'Single choice',
                        'items' => ['Small', 'Regular', 'Large'],
                        'used' => 'Beverages'
                    ],
                ] as $modifier)

                    <div class="rounded-2xl border border-[#DCE5DC] bg-white p-5">

                        <div class="flex items-start justify-between">

                            <div>

                                <div class="flex items-center gap-2">

                                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#E8F0E5] text-[#294936]">
                                        <x-tabler-adjustments-horizontal class="h-4 w-4" />
                                    </div>

                                    <h3 class="font-semibold text-[#26342A]">
                                        {{ $modifier['name'] }}
                                    </h3>

                                </div>

                                <p class="mt-2 text-xs text-[#8A958D]">
                                    {{ $modifier['type'] }}
                                </p>

                            </div>

                            <button class="flex h-8 w-8 items-center justify-center rounded-lg text-[#8A958D] hover:bg-[#F1F4F0]">
                                <x-tabler-dots class="h-4 w-4" />
                            </button>

                        </div>


                        <div class="mt-5 flex flex-wrap gap-2">

                            @foreach ($modifier['items'] as $option)

                                <span class="rounded-lg border border-[#DCE5DC] bg-[#F8FAF6] px-3 py-1.5 text-xs text-[#718076]">
                                    {{ $option }}
                                </span>

                            @endforeach

                        </div>


                        <div class="mt-5 border-t border-[#EDF0EC] pt-4">

                            <p class="text-[11px] uppercase tracking-[0.08em] text-[#9AA69D]">
                                Used by
                            </p>

                            <p class="mt-1 text-xs text-[#718076]">
                                {{ $modifier['used'] }}
                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>


    {{-- =========================================================
        INGREDIENTS
    ========================================================== --}}
    @elseif ($view === 'Ingredients')

        <div class="space-y-6">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>
                    <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                        Recipe & inventory
                    </p>

                    <h2 class="mt-1 text-xl font-semibold text-[#26342A]">
                        Ingredients
                    </h2>

                    <p class="mt-1 text-sm text-[#718076]">
                        Track the ingredients behind every dish on your menu.
                    </p>
                </div>

                <button class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#294936] px-4 py-2.5 text-sm font-medium text-white">
                    <x-tabler-plus class="h-4 w-4" />
                    Add ingredient
                </button>

            </div>


            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

                @foreach ([
                    ['name' => 'Ember-drake Ribs', 'stock' => '18 kg', 'status' => 'Healthy', 'used' => '3 dishes'],
                    ['name' => 'Moonroot', 'stock' => '4 kg', 'status' => 'Low stock', 'used' => '5 dishes'],
                    ['name' => 'Fireberries', 'stock' => '7 kg', 'status' => 'Healthy', 'used' => '6 dishes'],
                    ['name' => 'Wild Mushrooms', 'stock' => '2.5 kg', 'status' => 'Low stock', 'used' => '4 dishes'],
                    ['name' => 'Mountain Carrots', 'stock' => '12 kg', 'status' => 'Healthy', 'used' => '7 dishes'],
                    ['name' => 'Hearth Potatoes', 'stock' => '24 kg', 'status' => 'Healthy', 'used' => '8 dishes'],
                    ['name' => 'Dragon Salt', 'stock' => '1.2 kg', 'status' => 'Healthy', 'used' => '12 dishes'],
                    ['name' => 'Royal Cream', 'stock' => '3 L', 'status' => 'Healthy', 'used' => '5 dishes'],
                ] as $ingredient)

                    <div class="rounded-2xl border border-[#DCE5DC] bg-white p-5">

                        <div class="flex items-start justify-between">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F1E9DF] text-[#7D6048]">
                                <x-tabler-carrot class="h-5 w-5" />
                            </div>

                            <span class="rounded-full px-2 py-1 text-[10px] font-semibold
                                {{ $ingredient['status'] === 'Healthy'
                                    ? 'bg-[#E8F0E5] text-[#5E8067]'
                                    : 'bg-[#FFF4DD] text-[#9A762B]' }}"
                            >
                                {{ $ingredient['status'] }}
                            </span>

                        </div>

                        <h3 class="mt-4 font-medium text-[#26342A]">
                            {{ $ingredient['name'] }}
                        </h3>

                        <p class="mt-1 text-2xl font-semibold text-[#294936]">
                            {{ $ingredient['stock'] }}
                        </p>

                        <div class="mt-3 flex items-center justify-between text-xs text-[#8A958D]">

                            <span>
                                Current stock
                            </span>

                            <span>
                                {{ $ingredient['used'] }}
                            </span>

                        </div>

                        <div class="mt-3 h-1.5 overflow-hidden rounded-full bg-[#EDF0EC]">

                            <div
                                class="h-full rounded-full
                                    {{ $ingredient['status'] === 'Healthy'
                                        ? 'w-3/4 bg-[#5E8067]'
                                        : 'w-1/4 bg-[#C39A45]' }}"
                            ></div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Recipe relationship --}}
            <div class="rounded-2xl border border-[#DCE5DC] bg-white p-5">

                <div class="mb-5">

                    <h3 class="font-semibold text-[#26342A]">
                        Ingredient usage
                    </h3>

                    <p class="mt-1 text-sm text-[#718076]">
                        See how ingredients flow into your menu items.
                    </p>

                </div>

                <div class="divide-y divide-[#EDF0EC]">

                    @foreach ([
                        ['item' => 'Dragonfire Roast', 'ingredients' => 'Ember-drake ribs · Fireberries · Dragon Salt · Hearth Potatoes'],
                        ['item' => "Hunter's Feast", 'ingredients' => 'Venison · Wild Mushrooms · Hearth Potatoes · Hunter\'s Gravy'],
                        ['item' => 'Moonroot Stew', 'ingredients' => 'Moonroot · Mountain Carrots · Beef · Dragon Salt'],
                    ] as $recipe)

                        <div class="flex flex-col gap-2 py-4 sm:flex-row sm:items-center sm:justify-between">

                            <p class="text-sm font-medium text-[#26342A]">
                                {{ $recipe['item'] }}
                            </p>

                            <p class="text-xs text-[#718076] sm:text-right">
                                {{ $recipe['ingredients'] }}
                            </p>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>


    {{-- =========================================================
        AVAILABILITY
    ========================================================== --}}
    @elseif ($view === 'Availability')

        <div class="space-y-6">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>
                    <p class="text-xs font-medium uppercase tracking-[0.1em] text-[#8A958D]">
                        Service control
                    </p>

                    <h2 class="mt-1 text-xl font-semibold text-[#26342A]">
                        Availability
                    </h2>

                    <p class="mt-1 text-sm text-[#718076]">
                        Control when menus and dishes are available for ordering.
                    </p>
                </div>

                <button class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#294936] px-4 py-2.5 text-sm font-medium text-white">
                    <x-tabler-plus class="h-4 w-4" />
                    Add schedule
                </button>

            </div>


            {{-- Current service --}}
            <div class="overflow-hidden rounded-2xl border border-[#DCE5DC] bg-white">

                <div class="border-b border-[#DCE5DC] bg-[#F8FAF6] p-5">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <div class="flex items-center gap-2">

                                <span class="h-2.5 w-2.5 rounded-full bg-[#5E8067]"></span>

                                <h3 class="font-semibold text-[#26342A]">
                                    Current service
                                </h3>

                            </div>

                            <p class="mt-1 text-sm text-[#718076]">
                                Royal Dining Hall · Evening service
                            </p>

                        </div>

                        <span class="rounded-full bg-[#E8F0E5] px-3 py-1.5 text-xs font-semibold text-[#5E8067]">
                            Active now
                        </span>

                    </div>

                </div>


                <div class="divide-y divide-[#EDF0EC]">

                    @foreach ([
                        ['name' => 'Tavern Menu', 'window' => '11:00 AM — 10:00 PM', 'days' => 'Mon — Sun', 'status' => 'Live'],
                        ['name' => 'Royal Banquet Menu', 'window' => '5:00 PM — 11:00 PM', 'days' => 'Fri — Sun', 'status' => 'Live'],
                        ['name' => "Adventurer's Menu", 'window' => '7:00 AM — 11:00 PM', 'days' => 'Mon — Sun', 'status' => 'Draft'],
                        ['name' => 'Festival Menu', 'window' => '12:00 PM — 12:00 AM', 'days' => 'Dec 20 — Jan 5', 'status' => 'Scheduled'],
                    ] as $schedule)

                        <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-center sm:justify-between">

                            <div class="flex items-center gap-4">

                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F1F4F0] text-[#718076]">
                                    <x-tabler-calendar-event class="h-5 w-5" />
                                </div>

                                <div>

                                    <p class="font-medium text-[#26342A]">
                                        {{ $schedule['name'] }}
                                    </p>

                                    <div class="mt-1 flex flex-wrap items-center gap-2 text-xs text-[#8A958D]">

                                        <span>
                                            {{ $schedule['window'] }}
                                        </span>

                                        <span>·</span>

                                        <span>
                                            {{ $schedule['days'] }}
                                        </span>

                                    </div>

                                </div>

                            </div>


                            <div class="flex items-center justify-between gap-4 sm:justify-end">

                                <span class="rounded-full px-2.5 py-1 text-[10px] font-semibold
                                    {{ $schedule['status'] === 'Live'
                                        ? 'bg-[#E8F0E5] text-[#5E8067]'
                                        : ($schedule['status'] === 'Scheduled'
                                            ? 'bg-[#FFF4DD] text-[#9A762B]'
                                            : 'bg-[#F1F4F0] text-[#718076]') }}"
                                >
                                    {{ $schedule['status'] }}
                                </span>

                                <button class="flex h-8 w-8 items-center justify-center rounded-lg text-[#8A958D] hover:bg-[#F1F4F0] hover:text-[#294936]">
                                    <x-tabler-dots class="h-4 w-4" />
                                </button>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- Item availability --}}
            <div class="rounded-2xl border border-[#DCE5DC] bg-white p-5">

                <div class="mb-5">

                    <h3 class="font-semibold text-[#26342A]">
                        Item availability
                    </h3>

                    <p class="mt-1 text-sm text-[#718076]">
                        Items requiring attention across your active menus.
                    </p>

                </div>


                <div class="space-y-3">

                    @foreach ([
                        ['name' => 'Dragonfire Roast', 'reason' => 'Available all day', 'status' => 'Available'],
                        ['name' => 'Moonroot Stew', 'reason' => 'Low stock · approximately 12 servings', 'status' => 'Warning'],
                        ['name' => 'Fireberry Tart', 'reason' => 'Available after 2:00 PM', 'status' => 'Scheduled'],
                        ['name' => 'Royal Venison Platter', 'reason' => 'Ingredient unavailable', 'status' => 'Unavailable'],
                    ] as $availability)

                        <div class="flex flex-col gap-3 rounded-xl border border-[#EDF0EC] p-4 sm:flex-row sm:items-center sm:justify-between">

                            <div>

                                <p class="text-sm font-medium text-[#26342A]">
                                    {{ $availability['name'] }}
                                </p>

                                <p class="mt-1 text-xs text-[#8A958D]">
                                    {{ $availability['reason'] }}
                                </p>

                            </div>


                            <div>

                                <span class="inline-flex rounded-full px-2.5 py-1 text-[10px] font-semibold
                                    {{ $availability['status'] === 'Available'
                                        ? 'bg-[#E8F0E5] text-[#5E8067]'
                                        : ($availability['status'] === 'Warning'
                                            ? 'bg-[#FFF4DD] text-[#9A762B]'
                                            : ($availability['status'] === 'Scheduled'
                                                ? 'bg-[#EEF2F8] text-[#62738A]'
                                                : 'bg-[#FDE8E7] text-[#B94A48]')) }}"
                                >
                                    {{ $availability['status'] }}
                                </span>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    @endif

@endif


</div>
