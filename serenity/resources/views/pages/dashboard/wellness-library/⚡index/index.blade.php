{{-- resources/views/livewire/wellness/wellness-library.blade.php --}}

<div class="min-h-screen bg-[#F4FAFC]">

    {{-- =========================================================
    HEADER
    ========================================================== --}}

    <header class="border-b border-[#DCECEF] bg-[#F9FCFD]">

        <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8 lg:px-10">

            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

                <div>

                    <div
                        class="mb-3 flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#8AA4AE]">
                        <span>Wellness</span>
                        <x-tabler-chevron-right class="h-3 w-3" />
                        <span>Library</span>
                    </div>

                    <h1 class="text-3xl font-semibold tracking-[-0.045em] text-[#294A5B] sm:text-4xl">
                        Your wellness library
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-[#8198A2]">
                        Gentle resources for wherever you are today.
                        Explore at your own pace.
                    </p>

                </div>


                <div class="flex items-center gap-2">

                    <button
                        class="inline-flex items-center gap-2 rounded-xl border border-[#DCECEF] bg-white px-4 py-2.5 text-[9px] font-semibold text-[#718E98] transition hover:bg-[#F7FBFC]">
                        <x-tabler-bookmark class="h-3.5 w-3.5" />
                        Saved
                    </button>

                    <button
                        class="inline-flex items-center gap-2 rounded-xl bg-[#5AA7C2] px-4 py-2.5 text-[9px] font-semibold text-white shadow-[0_8px_24px_rgba(90,167,194,.14)] transition hover:bg-[#4D99B4]">
                        <x-tabler-sparkles class="h-3.5 w-3.5" />
                        Surprise me
                    </button>

                </div>

            </div>

        </div>

    </header>



    {{-- =========================================================
    MAIN
    ========================================================== --}}

    <main class="mx-auto max-w-7xl px-5 py-7 sm:px-8 lg:px-10">


        {{-- =====================================================
        HERO / WHAT DO YOU NEED?
        ====================================================== --}}

        <section class="relative overflow-hidden rounded-[30px] border border-[#D4E9ED] bg-[#EAF6F8]">

            <div class="absolute -right-24 -top-32 h-80 w-80 rounded-full bg-white/50 blur-3xl"></div>

            <div class="absolute -bottom-28 left-1/3 h-64 w-64 rounded-full bg-[#D9F0F3]/60 blur-3xl"></div>

            <div class="relative p-7 sm:p-9 lg:p-10">

                <div class="max-w-2xl">

                    <div
                        class="inline-flex items-center gap-2 rounded-full bg-white/70 px-3 py-1.5 text-[8px] font-bold uppercase tracking-[0.16em] text-[#719BA5]">

                        <x-tabler-sparkles class="h-3.5 w-3.5" />

                        Curated for you

                    </div>


                    <h2 class="mt-5 text-2xl font-semibold tracking-[-0.04em] text-[#456D78] sm:text-3xl">
                        What would feel helpful right now?
                    </h2>

                    <p class="mt-2 max-w-lg text-[11px] leading-5 text-[#78969F]">
                        You don't need to know exactly what you're looking for.
                        Start with how you're feeling and we'll help you find a place to begin.
                    </p>

                </div>


                {{-- Search --}}
                <div class="relative mt-7 max-w-2xl">

                    <x-tabler-search
                        class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-[#8EABB3]" />

                    <input type="text" placeholder="Search breathing exercises, sleep, anxiety, reflection..."
                        class="h-12 w-full rounded-2xl border border-white/80 bg-white/85 pl-11 pr-5 text-[10px] text-[#587780] outline-none placeholder:text-[#A6B7BB] transition focus:border-white focus:bg-white" />

                </div>


                {{-- Quick needs --}}
                <div class="mt-5 flex flex-wrap gap-2">

                    @foreach ([
                            ['label' => 'I need to slow down', 'icon' => 'wind'],
                            ['label' => 'I need better sleep', 'icon' => 'moon'],
                            ['label' => 'I feel overwhelmed', 'icon' => 'cloud'],
                            ['label' => 'I want to reflect', 'icon' => 'pencil'],
                            ['label' => 'I need a little hope', 'icon' => 'sun'],
                        ] as $need)

                        <button
                            class="inline-flex items-center gap-2 rounded-full border border-white/80 bg-white/60 px-3.5 py-2 text-[8px] font-medium text-[#708F98] transition hover:bg-white">

                            @if ($need['icon'] === 'wind')
                                <x-tabler-wind class="h-3.5 w-3.5" />
                            @elseif ($need['icon'] === 'moon')
                                <x-tabler-moon class="h-3.5 w-3.5" />
                            @elseif ($need['icon'] === 'cloud')
                                <x-tabler-cloud class="h-3.5 w-3.5" />
                            @elseif ($need['icon'] === 'pencil')
                                <x-tabler-pencil class="h-3.5 w-3.5" />
                            @else
                                <x-tabler-sun class="h-3.5 w-3.5" />
                            @endif

                            {{ $need['label'] }}

                        </button>

                    @endforeach

                </div>

            </div>

        </section>



        {{-- =====================================================
        FEATURED
        ====================================================== --}}

        <section class="mt-8">

            <div class="flex items-end justify-between">

                <div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                        Featured for you
                    </div>

                    <h2 class="mt-2 text-xl font-semibold tracking-[-0.035em] text-[#4E707B]">
                        A few places to begin
                    </h2>

                </div>


                <button class="hidden items-center gap-1.5 text-[9px] font-semibold text-[#6796A4] sm:flex">
                    View all
                    <x-tabler-arrow-right class="h-3.5 w-3.5" />
                </button>

            </div>


            <div class="mt-4 grid gap-4 md:grid-cols-3">


                {{-- Featured 1 --}}
                <article
                    class="group relative overflow-hidden rounded-[26px] border border-[#DCECEF] bg-white transition hover:-translate-y-0.5 hover:shadow-[0_15px_35px_rgba(65,110,125,.07)]">

                    <div class="relative h-40 overflow-hidden bg-[#DFF1F4]">

                        <div class="absolute -right-8 -top-10 h-40 w-40 rounded-full bg-[#BFDDE3]"></div>

                        <div
                            class="absolute bottom-[-25px] left-[-15px] h-32 w-32 rounded-full border-[18px] border-white/30">
                        </div>

                        <div class="absolute inset-0 flex items-center justify-center">

                            <div
                                class="flex h-16 w-16 items-center justify-center rounded-[22px] bg-white/80 text-[#66A0AE] shadow-sm">
                                <x-tabler-wind class="h-7 w-7" />
                            </div>

                        </div>


                        <span
                            class="absolute left-4 top-4 rounded-full bg-white/75 px-2.5 py-1 text-[7px] font-bold uppercase tracking-[0.14em] text-[#6D98A2]">
                            8 min
                        </span>


                        <button
                            class="absolute right-4 top-4 flex h-8 w-8 items-center justify-center rounded-full bg-white/75 text-[#7297A0]">
                            <x-tabler-bookmark class="h-3.5 w-3.5" />
                        </button>

                    </div>


                    <div class="p-5">

                        <div class="text-[8px] font-bold uppercase tracking-[0.14em] text-[#92A6AC]">
                            Guided practice
                        </div>

                        <h3 class="mt-2 text-sm font-semibold text-[#5A7982]">
                            A gentle reset
                        </h3>

                        <p class="mt-2 line-clamp-2 text-[9px] leading-4 text-[#96A7AC]">
                            A short breathing practice for moments
                            when everything feels a little too loud.
                        </p>


                        <button class="mt-4 inline-flex items-center gap-1.5 text-[9px] font-semibold text-[#6797A4]">
                            Begin practice
                            <x-tabler-arrow-right class="h-3.5 w-3.5 transition group-hover:translate-x-0.5" />
                        </button>

                    </div>

                </article>



                {{-- Featured 2 --}}
                <article
                    class="group relative overflow-hidden rounded-[26px] border border-[#DCECEF] bg-white transition hover:-translate-y-0.5 hover:shadow-[0_15px_35px_rgba(65,110,125,.07)]">

                    <div class="relative h-40 overflow-hidden bg-[#EAF1F7]">

                        <div class="absolute -left-10 -top-12 h-44 w-44 rounded-full bg-[#D3E3EE]"></div>

                        <div class="absolute -bottom-20 right-4 h-44 w-44 rounded-full bg-[#DDEAF2]"></div>

                        <div class="absolute inset-0 flex items-center justify-center">

                            <div
                                class="flex h-16 w-16 items-center justify-center rounded-[22px] bg-white/85 text-[#6E91AA] shadow-sm">
                                <x-tabler-moon-stars class="h-7 w-7" />
                            </div>

                        </div>


                        <span
                            class="absolute left-4 top-4 rounded-full bg-white/75 px-2.5 py-1 text-[7px] font-bold uppercase tracking-[0.14em] text-[#728EA2]">
                            12 min
                        </span>


                        <button
                            class="absolute right-4 top-4 flex h-8 w-8 items-center justify-center rounded-full bg-white/75 text-[#728EA0]">
                            <x-tabler-bookmark class="h-3.5 w-3.5" />
                        </button>

                    </div>


                    <div class="p-5">

                        <div class="text-[8px] font-bold uppercase tracking-[0.14em] text-[#92A6AC]">
                            Sleep
                        </div>

                        <h3 class="mt-2 text-sm font-semibold text-[#5A7982]">
                            Creating a softer night
                        </h3>

                        <p class="mt-2 line-clamp-2 text-[9px] leading-4 text-[#96A7AC]">
                            A simple evening ritual for creating
                            a little more space between your day and sleep.
                        </p>


                        <button class="mt-4 inline-flex items-center gap-1.5 text-[9px] font-semibold text-[#6797A4]">
                            Explore
                            <x-tabler-arrow-right class="h-3.5 w-3.5" />
                        </button>

                    </div>

                </article>



                {{-- Featured 3 --}}
                <article
                    class="group relative overflow-hidden rounded-[26px] border border-[#DCECEF] bg-white transition hover:-translate-y-0.5 hover:shadow-[0_15px_35px_rgba(65,110,125,.07)]">

                    <div class="relative h-40 overflow-hidden bg-[#EEF5F0]">

                        <div class="absolute -right-8 -bottom-12 h-48 w-48 rounded-full bg-[#D7E9DC]"></div>

                        <div class="absolute left-5 top-8 h-16 w-16 rounded-full border-[12px] border-white/30"></div>

                        <div class="absolute inset-0 flex items-center justify-center">

                            <div
                                class="flex h-16 w-16 items-center justify-center rounded-[22px] bg-white/85 text-[#70A08A] shadow-sm">
                                <x-tabler-leaf-2 class="h-7 w-7" />
                            </div>

                        </div>


                        <span
                            class="absolute left-4 top-4 rounded-full bg-white/75 px-2.5 py-1 text-[7px] font-bold uppercase tracking-[0.14em] text-[#759789]">
                            6 min
                        </span>


                        <button
                            class="absolute right-4 top-4 flex h-8 w-8 items-center justify-center rounded-full bg-white/75 text-[#759889]">
                            <x-tabler-bookmark class="h-3.5 w-3.5" />
                        </button>

                    </div>


                    <div class="p-5">

                        <div class="text-[8px] font-bold uppercase tracking-[0.14em] text-[#92A6AC]">
                            Reflection
                        </div>

                        <h3 class="mt-2 text-sm font-semibold text-[#5A7982]">
                            Being kinder to yourself
                        </h3>

                        <p class="mt-2 line-clamp-2 text-[9px] leading-4 text-[#96A7AC]">
                            Explore the difference between self-reflection
                            and self-criticism through a gentle exercise.
                        </p>


                        <button class="mt-4 inline-flex items-center gap-1.5 text-[9px] font-semibold text-[#6797A4]">
                            Read & reflect
                            <x-tabler-arrow-right class="h-3.5 w-3.5" />
                        </button>

                    </div>

                </article>

            </div>

        </section>



        {{-- =====================================================
        CATEGORIES
        ====================================================== --}}

        <section class="mt-9">

            <div class="flex items-end justify-between">

                <div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                        Explore
                    </div>

                    <h2 class="mt-2 text-xl font-semibold tracking-[-0.035em] text-[#4E707B]">
                        Find your kind of wellness
                    </h2>

                </div>


                <button class="hidden text-[9px] font-semibold text-[#6796A4] sm:block">
                    Browse everything
                </button>

            </div>


            <div class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-6">


                @foreach ([
                        [
                            'title' => 'Mindfulness',
                            'count' => '18 resources',
                            'icon' => 'sparkles',
                            'bg' => 'bg-[#EAF6F8]',
                            'text' => 'text-[#68A0AE]',
                        ],
                        [
                            'title' => 'Sleep',
                            'count' => '14 resources',
                            'icon' => 'moon',
                            'bg' => 'bg-[#EEF3F8]',
                            'text' => 'text-[#718FAA]',
                        ],
                        [
                            'title' => 'Stress',
                            'count' => '21 resources',
                            'icon' => 'cloud',
                            'bg' => 'bg-[#F4F1F7]',
                            'text' => 'text-[#8B7C9A]',
                        ],
                        [
                            'title' => 'Emotions',
                            'count' => '16 resources',
                            'icon' => 'heart',
                            'bg' => 'bg-[#F8F0F0]',
                            'text' => 'text-[#A47F86]',
                        ],
                        [
                            'title' => 'Reflection',
                            'count' => '12 resources',
                            'icon' => 'pencil',
                            'bg' => 'bg-[#F0F7F3]',
                            'text' => 'text-[#729A87]',
                        ],
                        [
                            'title' => 'Resilience',
                            'count' => '9 resources',
                            'icon' => 'shield',
                            'bg' => 'bg-[#F2F6F7]',
                            'text' => 'text-[#718D95]',
                        ],
                    ] as $category)

                    <button
                        class="group rounded-[22px] border border-[#DCECEF] bg-white p-4 text-left transition hover:-translate-y-0.5 hover:shadow-[0_10px_25px_rgba(65,110,125,.055)]">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-xl {{ $category['bg'] }} {{ $category['text'] }}">

                            @if ($category['icon'] === 'sparkles')
                                <x-tabler-sparkles class="h-4.5 w-4.5" />
                            @elseif ($category['icon'] === 'moon')
                                <x-tabler-moon class="h-4.5 w-4.5" />
                            @elseif ($category['icon'] === 'cloud')
                                <x-tabler-cloud class="h-4.5 w-4.5" />
                            @elseif ($category['icon'] === 'heart')
                                <x-tabler-heart class="h-4.5 w-4.5" />
                            @elseif ($category['icon'] === 'pencil')
                                <x-tabler-pencil class="h-4.5 w-4.5" />
                            @else
                                <x-tabler-shield-heart class="h-4.5 w-4.5" />
                            @endif

                        </div>


                        <h3 class="mt-4 text-[10px] font-semibold text-[#637F88]">
                            {{ $category['title'] }}
                        </h3>

                        <p class="mt-1 text-[8px] text-[#A0AFB3]">
                            {{ $category['count'] }}
                        </p>


                        <div class="mt-4 flex items-center justify-between">

                            <span class="text-[8px] font-semibold text-[#82A0A8]">
                                Explore
                            </span>

                            <x-tabler-arrow-up-right
                                class="h-3.5 w-3.5 text-[#A4B4B8] transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5" />

                        </div>

                    </button>

                @endforeach

            </div>

        </section>



        {{-- =====================================================
        RESOURCE TYPES
        ====================================================== --}}

        <section class="mt-9 grid gap-5 lg:grid-cols-[1fr_350px]">


            {{-- Resource collection --}}
            <div class="rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-8">

                <div class="flex items-end justify-between">

                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                            Resource types
                        </div>

                        <h2 class="mt-2 text-lg font-semibold tracking-[-0.03em] text-[#52727D]">
                            How would you like to spend a few minutes?
                        </h2>

                    </div>

                </div>


                <div class="mt-5 space-y-2">


                    @foreach ([
                            [
                                'title' => 'Guided practices',
                                'description' => 'Breathing, grounding, meditation & gentle movement',
                                'count' => '24',
                                'icon' => 'player-play',
                            ],
                            [
                                'title' => 'Short reads',
                                'description' => 'Thoughtful articles about everyday wellbeing',
                                'count' => '31',
                                'icon' => 'book',
                            ],
                            [
                                'title' => 'Audio journeys',
                                'description' => 'Listen when you need a little space',
                                'count' => '17',
                                'icon' => 'headphones',
                            ],
                            [
                                'title' => 'Reflection exercises',
                                'description' => 'Prompts to help you pause and notice',
                                'count' => '19',
                                'icon' => 'notebook',
                            ],
                        ] as $resource)

                        <button
                            class="group flex w-full items-center gap-4 rounded-2xl border border-transparent p-3 text-left transition hover:border-[#E1ECEE] hover:bg-[#F8FBFC]">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#EEF7F8] text-[#70A0AC]">

                                @if ($resource['icon'] === 'player-play')
                                    <x-tabler-player-play class="h-4.5 w-4.5" />
                                @elseif ($resource['icon'] === 'book')
                                    <x-tabler-book-2 class="h-4.5 w-4.5" />
                                @elseif ($resource['icon'] === 'headphones')
                                    <x-tabler-headphones class="h-4.5 w-4.5" />
                                @else
                                    <x-tabler-notebook class="h-4.5 w-4.5" />
                                @endif

                            </div>


                            <div class="min-w-0 flex-1">

                                <div class="text-[10px] font-semibold text-[#667F87]">
                                    {{ $resource['title'] }}
                                </div>

                                <div class="mt-1 text-[8px] leading-4 text-[#A0AEB2]">
                                    {{ $resource['description'] }}
                                </div>

                            </div>


                            <div class="hidden text-right sm:block">

                                <div class="text-sm font-semibold text-[#7898A0]">
                                    {{ $resource['count'] }}
                                </div>

                                <div class="text-[7px] text-[#A8B4B7]">
                                    resources
                                </div>

                            </div>


                            <x-tabler-chevron-right
                                class="h-4 w-4 shrink-0 text-[#B1BEC1] transition group-hover:translate-x-0.5" />

                        </button>

                    @endforeach

                </div>

            </div>



            {{-- Saved --}}
            <aside class="rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-7">

                <div class="flex items-center justify-between">

                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                            Saved for later
                        </div>

                        <h2 class="mt-2 text-lg font-semibold tracking-[-0.03em] text-[#52727D]">
                            Your collection
                        </h2>

                    </div>

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#EEF7F8] text-[#6D9DA9]">
                        <x-tabler-bookmark class="h-4 w-4" />
                    </div>

                </div>


                <div class="mt-5 space-y-3">


                    @foreach ([
                            ['title' => 'A quiet evening', 'type' => 'Audio · 9 min', 'icon' => 'headphones'],
                            ['title' => `When your mind won't stop`, 'type' => 'Read · 6 min', 'icon' => 'book'],
                            ['title' => 'Three things I can let go of', 'type' => 'Reflection · 4 min', 'icon' => 'pencil'],
                        ] as $saved)

                        <button
                            class="group flex w-full items-center gap-3 rounded-xl p-2 text-left transition hover:bg-[#F7FAFB]">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-[#F2F7F8] text-[#7B9BA3]">

                                @if ($saved['icon'] === 'headphones')
                                    <x-tabler-headphones class="h-3.5 w-3.5" />
                                @elseif ($saved['icon'] === 'book')
                                    <x-tabler-book-2 class="h-3.5 w-3.5" />
                                @else
                                    <x-tabler-pencil class="h-3.5 w-3.5" />
                                @endif

                            </div>

                            <div class="min-w-0 flex-1">

                                <div class="truncate text-[9px] font-semibold text-[#718990]">
                                    {{ $saved['title'] }}
                                </div>

                                <div class="mt-1 text-[7px] text-[#A3B0B4]">
                                    {{ $saved['type'] }}
                                </div>

                            </div>

                            <x-tabler-arrow-up-right class="h-3.5 w-3.5 text-[#B1BEC1]" />

                        </button>

                    @endforeach

                </div>


                <button
                    class="mt-4 flex w-full items-center justify-center gap-1.5 rounded-xl border border-[#DCECEF] py-2.5 text-[8px] font-semibold text-[#7898A1] transition hover:bg-[#F8FBFC]">
                    View saved resources
                    <x-tabler-arrow-right class="h-3 w-3" />
                </button>

            </aside>

        </section>



        {{-- =====================================================
        EDITOR'S COLLECTION
        ====================================================== --}}

        <section class="mt-9">

            <div class="flex items-end justify-between">

                <div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                        Serenity picks
                    </div>

                    <h2 class="mt-2 text-xl font-semibold tracking-[-0.035em] text-[#4E707B]">
                        A little more to explore
                    </h2>

                </div>


                <div class="flex items-center gap-2">

                    <button
                        class="flex h-8 w-8 items-center justify-center rounded-lg border border-[#DCECEF] bg-white text-[#8CA3A9]">
                        <x-tabler-chevron-left class="h-3.5 w-3.5" />
                    </button>

                    <button
                        class="flex h-8 w-8 items-center justify-center rounded-lg border border-[#DCECEF] bg-white text-[#8CA3A9]">
                        <x-tabler-chevron-right class="h-3.5 w-3.5" />
                    </button>

                </div>

            </div>


            <div class="mt-4 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">


                @foreach ([
                        ['title' => 'The art of pausing', 'type' => 'Short read', 'time' => '5 min', 'icon' => 'player-play', 'bg' => 'bg-[#EEF7F8]'],
                        ['title' => 'Come back to your body', 'type' => 'Guided practice', 'time' => '7 min', 'icon' => 'wind', 'bg' => 'bg-[#F0F6F3]'],
                        ['title' => 'A kinder inner voice', 'type' => 'Reflection', 'time' => '4 min', 'icon' => 'heart', 'bg' => 'bg-[#F5F0F6]'],
                        ['title' => 'Making room for rest', 'type' => 'Audio journey', 'time' => '11 min', 'icon' => 'headphones', 'bg' => 'bg-[#EEF3F8]'],
                    ] as $item)

                    <article
                        class="group overflow-hidden rounded-[22px] border border-[#DCECEF] bg-white transition hover:-translate-y-0.5 hover:shadow-[0_10px_25px_rgba(65,110,125,.055)]">

                        <div class="relative flex h-28 items-center justify-center {{ $item['bg'] }}">

                            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/80 text-[#759BA4]">

                                @if ($item['icon'] === 'player-play')
                                    <x-tabler-player-play class="h-5 w-5" />
                                @elseif ($item['icon'] === 'wind')
                                    <x-tabler-wind class="h-5 w-5" />
                                @elseif ($item['icon'] === 'heart')
                                    <x-tabler-heart class="h-5 w-5" />
                                @else
                                    <x-tabler-headphones class="h-5 w-5" />
                                @endif

                            </div>

                            <span
                                class="absolute bottom-3 left-3 rounded-full bg-white/75 px-2 py-1 text-[7px] font-medium text-[#78959D]">
                                {{ $item['time'] }}
                            </span>

                        </div>


                        <div class="p-4">

                            <div class="text-[7px] font-bold uppercase tracking-[0.14em] text-[#9AA9AE]">
                                {{ $item['type'] }}
                            </div>

                            <h3 class="mt-1.5 text-[10px] font-semibold text-[#687F87]">
                                {{ $item['title'] }}
                            </h3>

                            <button class="mt-3 text-[8px] font-semibold text-[#7098A2]">
                                Explore →
                            </button>

                        </div>

                    </article>

                @endforeach

            </div>

        </section>



        {{-- =====================================================
        GENTLE FOOTER NOTE
        ====================================================== --}}

        <div class="mt-8 flex items-center justify-center gap-2 px-4 py-3 text-center">

            <x-tabler-info-circle class="h-3.5 w-3.5 shrink-0 text-[#A0B0B4]" />

            <p class="text-[8px] leading-4 text-[#9BA9AE]">
                Serenity's library is designed for general wellness and reflection.
                It isn't a substitute for professional mental-health care.
            </p>

        </div>


        <div class="h-8"></div>

    </main>

</div>