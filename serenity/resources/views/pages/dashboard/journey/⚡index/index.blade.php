{{-- resources/views/livewire/journey.blade.php --}}

<div class="min-h-screen bg-[#F4FAFC]">

    {{-- =========================================================
    HEADER
    ========================================================== --}}

    <div class="border-b border-[#DCECEF] bg-[#F9FCFD]">

        <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8 lg:px-10">

            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

                <div>

                    <div
                        class="mb-3 flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#8AA4AE]">
                        <span>Serenity</span>
                        <x-tabler-chevron-right class="h-3 w-3" />
                        <span>My journey</span>
                    </div>

                    <h1 class="text-3xl font-semibold tracking-[-0.04em] text-[#294A5B] sm:text-4xl">
                        Your journey
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-[#8198A2]">
                        A quiet look back at where you've been, what you've noticed,
                        and the small steps you've taken along the way.
                    </p>

                </div>


                <div class="flex items-center gap-2">

                    <button
                        class="inline-flex items-center gap-2 rounded-xl border border-[#DCECEF] bg-white px-4 py-2.5 text-xs font-semibold text-[#68828D] transition hover:border-[#C6E0E7] hover:text-[#4F8FA4]">
                        <x-tabler-calendar class="h-4 w-4" />
                        Last 30 days
                        <x-tabler-chevron-down class="h-3.5 w-3.5" />
                    </button>

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
    CONTENT
    ========================================================== --}}

    <main class="mx-auto max-w-7xl px-5 py-8 sm:px-8 lg:px-10">


        {{-- =====================================================
        HERO / JOURNEY SUMMARY
        ====================================================== --}}

        <section class="relative overflow-hidden rounded-[30px] border border-[#D8EAEE] bg-white">

            {{-- soft decorative shapes --}}
            <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-[#E5F5F8] blur-2xl">
            </div>

            <div class="pointer-events-none absolute -bottom-32 left-1/3 h-64 w-64 rounded-full bg-[#EEF7F5] blur-3xl">
            </div>


            <div class="relative grid lg:grid-cols-[1.15fr_.85fr]">

                {{-- Left --}}
                <div class="p-7 sm:p-9 lg:p-11">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#E2F3F6] text-[#5D9EB3]">
                            <x-tabler-route class="h-5 w-5" />
                        </div>

                        <div>

                            <div class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8BA4AE]">
                                Since June 12
                            </div>

                            <div class="mt-0.5 text-xs font-medium text-[#6D8792]">
                                Your Serenity journey
                            </div>

                        </div>

                    </div>


                    <h2
                        class="mt-8 max-w-lg text-3xl font-semibold leading-tight tracking-[-0.04em] text-[#294A5B] sm:text-4xl">
                        You're allowed to notice
                        <span class="text-[#68A6B8]">the progress</span>
                        you usually miss.
                    </h2>


                    <p class="mt-5 max-w-xl text-sm leading-7 text-[#7E969F]">
                        You've checked in <strong class="font-semibold text-[#587985]">24 times</strong>
                        over the last month. That's 24 moments where you paused
                        long enough to ask yourself how you were doing.
                    </p>


                    <div class="mt-8 flex flex-wrap gap-2">

                        <div class="rounded-full bg-[#EFF8F9] px-3.5 py-2 text-[10px] font-semibold text-[#5D96A7]">
                            24 check-ins
                        </div>

                        <div class="rounded-full bg-[#F2F8F5] px-3.5 py-2 text-[10px] font-semibold text-[#709584]">
                            12 reflections
                        </div>

                        <div class="rounded-full bg-[#F7F4FB] px-3.5 py-2 text-[10px] font-semibold text-[#8976A0]">
                            8 rituals
                        </div>

                    </div>

                </div>


                {{-- Right visual --}}
                <div
                    class="relative flex min-h-[310px] items-center justify-center overflow-hidden border-t border-[#E6F0F2] bg-[#F7FCFD] p-8 lg:border-l lg:border-t-0">

                    {{-- Decorative journey path --}}
                    <svg viewBox="0 0 420 260" class="absolute inset-0 h-full w-full" fill="none">

                        <path
                            d="M20 210 C75 180 80 220 125 165 C165 115 190 170 230 110 C270 50 300 100 340 65 C365 45 390 55 410 25"
                            stroke="#C8E5EB" stroke-width="2" stroke-dasharray="5 7" />

                    </svg>


                    {{-- Journey points --}}
                    <div class="relative h-[240px] w-full max-w-[410px]">

                        <div class="absolute bottom-4 left-2 flex flex-col items-center">
                            <div class="h-3 w-3 rounded-full bg-[#A8CFD9] ring-8 ring-[#EAF6F8]"></div>
                            <span class="mt-3 text-[9px] font-semibold text-[#91A7AF]">
                                Started
                            </span>
                        </div>


                        <div class="absolute bottom-[72px] left-[25%] flex flex-col items-center">
                            <div class="h-3 w-3 rounded-full bg-[#8EC2CF] ring-8 ring-[#EAF6F8]"></div>
                            <span class="mt-3 text-[9px] font-semibold text-[#91A7AF]">
                                First week
                            </span>
                        </div>


                        <div class="absolute bottom-[120px] left-[49%] flex flex-col items-center">
                            <div class="h-3.5 w-3.5 rounded-full bg-[#67AEC1] ring-8 ring-[#E2F3F6]"></div>
                            <span class="mt-3 text-[9px] font-semibold text-[#72919B]">
                                First session
                            </span>
                        </div>


                        <div class="absolute right-[15%] top-[65px] flex flex-col items-center">
                            <div class="h-3.5 w-3.5 rounded-full bg-[#5AA7C2] ring-8 ring-[#DDF1F5]"></div>
                            <span class="mt-3 text-[9px] font-semibold text-[#5C8997]">
                                10 check-ins
                            </span>
                        </div>


                        <div class="absolute right-1 top-0 flex flex-col items-center">
                            <div
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-[#5AA7C2] text-white shadow-[0_8px_20px_rgba(90,167,194,0.22)] ring-8 ring-[#E4F5F8]">
                                <x-tabler-sparkles class="h-4 w-4" />
                            </div>
                            <span class="mt-3 text-[9px] font-bold text-[#5C8997]">
                                Today
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
        STATS
        ====================================================== --}}

        <section class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ([
                    ['icon' => 'mood-smile', 'label' => 'Average mood', 'value' => '7.4', 'suffix' => '/10', 'change' => '+0.8', 'tone' => 'blue'],
                    ['icon' => 'battery-3', 'label' => 'Average energy', 'value' => '6.8', 'suffix' => '/10', 'change' => '+0.4', 'tone' => 'green'],
                    ['icon' => 'flame', 'label' => 'Check-in rhythm', 'value' => '8', 'suffix' => ' days', 'change' => 'current', 'tone' => 'amber'],
                    ['icon' => 'heart', 'label' => 'Care sessions', 'value' => '6', 'suffix' => ' completed', 'change' => 'this month', 'tone' => 'purple'],
                ] as $stat)

                <div class="rounded-[22px] border border-[#DCECEF] bg-white p-5">

                    <div class="flex items-center justify-between">

                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#EFF7F9] text-[#6AA4B5]">
                            @if ($stat['icon'] === 'mood-smile')
                                <x-tabler-mood-smile class="h-4 w-4" />
                            @elseif ($stat['icon'] === 'battery-3')
                                <x-tabler-battery-3 class="h-4 w-4" />
                            @elseif ($stat['icon'] === 'flame')
                                <x-tabler-flame class="h-4 w-4" />
                            @else
                                <x-tabler-heart class="h-4 w-4" />
                            @endif
                        </div>

                        <span class="text-[9px] font-semibold text-[#86A0A9]">
                            {{ $stat['change'] }}
                        </span>

                    </div>

                    <div class="mt-5">

                        <div class="text-2xl font-semibold tracking-tight text-[#365867]">
                            {{ $stat['value'] }}
                            <span class="text-xs font-medium text-[#A0AFB5]">
                                {{ $stat['suffix'] }}
                            </span>
                        </div>

                        <div class="mt-1 text-[10px] font-medium text-[#91A3A9]">
                            {{ $stat['label'] }}
                        </div>

                    </div>

                </div>

            @endforeach

        </section>



        {{-- =====================================================
        TWO COLUMN
        ====================================================== --}}

        <div class="mt-5 grid gap-5 lg:grid-cols-[1.4fr_.8fr]">


            {{-- =================================================
            MOOD JOURNEY
            ================================================== --}}

            <section class="rounded-[26px] border border-[#DCECEF] bg-white p-6 sm:p-7">

                <div class="flex items-start justify-between">

                    <div>

                        <div class="flex items-center gap-2">

                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#EAF6F8] text-[#67A4B6]">
                                <x-tabler-chart-line class="h-4 w-4" />
                            </div>

                            <h2 class="text-sm font-semibold text-[#4E6E79]">
                                Your mood over time
                            </h2>

                        </div>

                        <p class="mt-2 text-[10px] text-[#9AAAB0]">
                            A gentle view of your check-ins
                        </p>

                    </div>


                    <button class="rounded-lg p-2 text-[#91A6AE] hover:bg-[#F5FAFB]">
                        <x-tabler-dots class="h-4 w-4" />
                    </button>

                </div>


                {{-- Fake chart --}}
                <div class="relative mt-8 h-[230px]">

                    {{-- grid --}}
                    <div class="absolute inset-0 flex flex-col justify-between">

                        @foreach ([10, 8, 6, 4, 2] as $number)

                            <div class="flex items-center gap-3">

                                <span class="w-5 text-[9px] text-[#A7B5BA]">
                                    {{ $number }}
                                </span>

                                <div class="h-px flex-1 bg-[#EDF3F4]"></div>

                            </div>

                        @endforeach

                    </div>


                    {{-- SVG chart --}}
                    <svg viewBox="0 0 700 210" preserveAspectRatio="none"
                        class="absolute inset-x-8 bottom-0 top-0 h-full w-[calc(100%-2rem)]">

                        <defs>

                            <linearGradient id="moodFill" x1="0" y1="0" x2="0" y2="1">

                                <stop offset="0%" stop-color="#B9DFE8" stop-opacity=".35" />

                                <stop offset="100%" stop-color="#B9DFE8" stop-opacity="0" />

                            </linearGradient>

                        </defs>


                        <path d="M0 140
                               C25 130 35 120 55 125
                               S85 105 105 115
                               S140 145 160 125
                               S190 90 215 100
                               S245 75 270 88
                               S305 110 325 95
                               S355 72 375 80
                               S405 110 425 95
                               S450 60 475 70
                               S500 88 520 76
                               S550 45 570 55
                               S600 75 620 60
                               S650 30 700 40
                               L700 210
                               L0 210 Z" fill="url(#moodFill)" />


                        <path d="M0 140
                               C25 130 35 120 55 125
                               S85 105 105 115
                               S140 145 160 125
                               S190 90 215 100
                               S245 75 270 88
                               S305 110 325 95
                               S355 72 375 80
                               S405 110 425 95
                               S450 60 475 70
                               S500 88 520 76
                               S550 45 570 55
                               S600 75 620 60
                               S650 30 700 40" fill="none" stroke="#69AFC1" stroke-width="3" stroke-linecap="round" />

                    </svg>


                    {{-- Current point --}}
                    <div class="absolute right-1 top-[28px]">

                        <div class="relative">

                            <div class="absolute -inset-2 rounded-full bg-[#CDEAF0] opacity-60"></div>

                            <div class="relative h-3 w-3 rounded-full bg-[#5AA7C2] ring-4 ring-white"></div>

                        </div>

                    </div>


                    {{-- labels --}}
                    <div class="absolute inset-x-8 bottom-[-24px] flex justify-between">

                        @foreach (['Sep 3', 'Sep 10', 'Sep 17', 'Sep 24', 'Today'] as $date)

                            <span class="text-[9px] text-[#A1AFB4]">
                                {{ $date }}
                            </span>

                        @endforeach

                    </div>

                </div>


                <div class="mt-14 rounded-2xl bg-[#F7FBFC] p-4">

                    <div class="flex gap-3">

                        <x-tabler-sparkles class="mt-0.5 h-4 w-4 shrink-0 text-[#6BA9B9]" />

                        <p class="text-[11px] leading-5 text-[#78919B]">
                            Your check-ins show more days around <strong
                                class="font-semibold text-[#587986]">7–8</strong>
                            lately. Patterns can be useful to notice, but they don't define how you're doing.
                        </p>

                    </div>

                </div>

            </section>



            {{-- =================================================
            THIS MONTH
            ================================================== --}}

            <section class="rounded-[26px] border border-[#DCECEF] bg-white p-6 sm:p-7">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-sm font-semibold text-[#4E6E79]">
                            Your rhythm
                        </h2>

                        <p class="mt-1 text-[10px] text-[#9AAAB0]">
                            September
                        </p>

                    </div>

                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#EFF8F9] text-[#69A5B5]">
                        <x-tabler-calendar-heart class="h-4 w-4" />
                    </div>

                </div>


                {{-- Calendar --}}
                <div class="mt-7 grid grid-cols-7 gap-y-3 text-center">

                    @foreach (['M', 'T', 'W', 'T', 'F', 'S', 'S'] as $day)

                        <span class="text-[8px] font-bold text-[#A2B1B6]">
                            {{ $day }}
                        </span>

                    @endforeach


                    @for ($i = 1; $i <= 30; $i++)

                        @php
                            $checked = in_array($i, [2, 3, 4, 6, 7, 8, 11, 12, 13, 14, 16, 18, 19, 20, 22, 23, 24, 25, 27, 28, 29, 30]);
                            $today = $i === 30;
                        @endphp

                        <div class="flex justify-center">

                            <div class="flex h-7 w-7 items-center justify-center rounded-full text-[9px] font-medium"
                                @class([
                                    'bg-[#DDF1F5] text-[#5795A7]' => $checked && !$today,
                                    'bg-[#5AA7C2] text-white shadow-sm' => $today,
                                    'text-[#B5C0C4]' => !$checked && !$today,
                                ])>
                                {{ $i }}
                            </div>

                        </div>

                    @endfor

                </div>


                <div class="mt-7 border-t border-[#EDF2F3] pt-5">

                    <div class="flex items-center justify-between">

                        <span class="text-[10px] font-medium text-[#879DA5]">
                            Check-in rhythm
                        </span>

                        <span class="text-xs font-semibold text-[#5C8795]">
                            22 / 30 days
                        </span>

                    </div>

                    <div class="mt-3 h-1.5 overflow-hidden rounded-full bg-[#EDF3F4]">

                        <div class="h-full w-[73%] rounded-full bg-[#7CBAC8]"></div>

                    </div>

                </div>

            </section>

        </div>



        {{-- =====================================================
        MILESTONES + REFLECTIONS
        ====================================================== --}}

        <div class="mt-5 grid gap-5 lg:grid-cols-[.85fr_1.15fr]">


            {{-- =================================================
            MILESTONES
            ================================================== --}}

            <section class="rounded-[26px] border border-[#DCECEF] bg-white p-6 sm:p-7">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-sm font-semibold text-[#4E6E79]">
                            Moments along the way
                        </h2>

                        <p class="mt-1 text-[10px] text-[#9AAAB0]">
                            Small things worth remembering
                        </p>

                    </div>

                    <x-tabler-sparkles class="h-4 w-4 text-[#76AFBD]" />

                </div>


                <div class="relative mt-8">

                    <div class="absolute bottom-4 left-[17px] top-4 w-px bg-[#DDECEF]"></div>


                    <div class="relative flex gap-4 pb-7">

                        <div
                            class="relative z-10 flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#E5F4F7] text-[#62A0B2] ring-4 ring-white">
                            <x-tabler-heart-handshake class="h-4 w-4" />
                        </div>

                        <div>

                            <div class="text-[9px] font-bold uppercase tracking-[0.12em] text-[#9AAEB5]">
                                Sep 24
                            </div>

                            <h3 class="mt-1 text-xs font-semibold text-[#5A7782]">
                                Six care sessions
                            </h3>

                            <p class="mt-1 text-[10px] leading-4 text-[#97A7AD]">
                                You kept showing up for yourself.
                            </p>

                        </div>

                    </div>


                    <div class="relative flex gap-4 pb-7">

                        <div
                            class="relative z-10 flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#EEF7F3] text-[#709A88] ring-4 ring-white">
                            <x-tabler-leaf class="h-4 w-4" />
                        </div>

                        <div>

                            <div class="text-[9px] font-bold uppercase tracking-[0.12em] text-[#9AAEB5]">
                                Sep 16
                            </div>

                            <h3 class="mt-1 text-xs font-semibold text-[#5A7782]">
                                First 10-day rhythm
                            </h3>

                            <p class="mt-1 text-[10px] leading-4 text-[#97A7AD]">
                                A new habit began taking shape.
                            </p>

                        </div>

                    </div>


                    <div class="relative flex gap-4">

                        <div
                            class="relative z-10 flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#F2EEF8] text-[#8B77A0] ring-4 ring-white">
                            <x-tabler-book-2 class="h-4 w-4" />
                        </div>

                        <div>

                            <div class="text-[9px] font-bold uppercase tracking-[0.12em] text-[#9AAEB5]">
                                Sep 4
                            </div>

                            <h3 class="mt-1 text-xs font-semibold text-[#5A7782]">
                                First reflection
                            </h3>

                            <p class="mt-1 text-[10px] leading-4 text-[#97A7AD]">
                                You started putting words to your thoughts.
                            </p>

                        </div>

                    </div>

                </div>

            </section>



            {{-- =================================================
            REFLECTIONS
            ================================================== --}}

            <section class="rounded-[26px] border border-[#DCECEF] bg-white p-6 sm:p-7">

                <div class="flex items-center justify-between">

                    <div>

                        <h2 class="text-sm font-semibold text-[#4E6E79]">
                            Recent reflections
                        </h2>

                        <p class="mt-1 text-[10px] text-[#9AAAB0]">
                            Thoughts you've chosen to keep
                        </p>

                    </div>

                    <a href="/journal" class="text-[10px] font-semibold text-[#5B98AA] hover:text-[#437F91]">
                        View journal
                    </a>

                </div>


                <div class="mt-6 space-y-3">


                    {{-- Reflection --}}
                    <a href="/journal/1"
                        class="group block rounded-2xl border border-[#E5EFF1] bg-[#FAFCFD] p-4 transition hover:border-[#CDE3E8] hover:bg-[#F7FBFC]">

                        <div class="flex items-start justify-between gap-5">

                            <div class="min-w-0">

                                <div class="flex items-center gap-2">

                                    <span class="text-[9px] font-bold uppercase tracking-[0.12em] text-[#9BAEB3]">
                                        Today
                                    </span>

                                    <span class="h-1 w-1 rounded-full bg-[#C6D4D8]"></span>

                                    <span class="text-[9px] text-[#9BAEB3]">
                                        Calm
                                    </span>

                                </div>

                                <p class="mt-2 truncate text-xs font-medium text-[#607C87]">
                                    “I think I'm finally learning that resting doesn't mean...
                                </p>

                            </div>

                            <x-tabler-arrow-up-right
                                class="h-4 w-4 shrink-0 text-[#A5B4B9] transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[#5C9AAC]" />

                        </div>

                    </a>


                    <a href="/journal/2"
                        class="group block rounded-2xl border border-[#E5EFF1] bg-[#FAFCFD] p-4 transition hover:border-[#CDE3E8] hover:bg-[#F7FBFC]">

                        <div class="flex items-start justify-between gap-5">

                            <div class="min-w-0">

                                <div class="flex items-center gap-2">

                                    <span class="text-[9px] font-bold uppercase tracking-[0.12em] text-[#9BAEB3]">
                                        Sep 28
                                    </span>

                                    <span class="h-1 w-1 rounded-full bg-[#C6D4D8]"></span>

                                    <span class="text-[9px] text-[#9BAEB3]">
                                        Hopeful
                                    </span>

                                </div>

                                <p class="mt-2 truncate text-xs font-medium text-[#607C87]">
                                    “Tomorrow I want to give myself permission to...
                                </p>

                            </div>

                            <x-tabler-arrow-up-right
                                class="h-4 w-4 shrink-0 text-[#A5B4B9] transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[#5C9AAC]" />

                        </div>

                    </a>


                    <a href="/journal/3"
                        class="group block rounded-2xl border border-[#E5EFF1] bg-[#FAFCFD] p-4 transition hover:border-[#CDE3E8] hover:bg-[#F7FBFC]">

                        <div class="flex items-start justify-between gap-5">

                            <div class="min-w-0">

                                <div class="flex items-center gap-2">

                                    <span class="text-[9px] font-bold uppercase tracking-[0.12em] text-[#9BAEB3]">
                                        Sep 25
                                    </span>

                                    <span class="h-1 w-1 rounded-full bg-[#C6D4D8]"></span>

                                    <span class="text-[9px] text-[#9BAEB3]">
                                        Tired
                                    </span>

                                </div>

                                <p class="mt-2 truncate text-xs font-medium text-[#607C87]">
                                    “It was a difficult week, but I noticed...
                                </p>

                            </div>

                            <x-tabler-arrow-up-right
                                class="h-4 w-4 shrink-0 text-[#A5B4B9] transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[#5C9AAC]" />

                        </div>

                    </a>

                </div>

            </section>

        </div>



        {{-- =====================================================
        GENTLE INSIGHT
        ====================================================== --}}

        <section class="mt-5 overflow-hidden rounded-[26px] border border-[#DCECEF] bg-[#EAF6F8]">

            <div class="flex flex-col gap-6 p-6 sm:p-8 md:flex-row md:items-center md:justify-between">

                <div class="flex gap-4">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white text-[#63A2B4]">
                        <x-tabler-sparkles class="h-5 w-5" />
                    </div>

                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#72A0AB]">
                            A gentle observation
                        </div>

                        <h3 class="mt-2 text-sm font-semibold text-[#527580]">
                            You've been checking in more consistently.
                        </h3>

                        <p class="mt-1 max-w-2xl text-xs leading-5 text-[#78959E]">
                            Your recent reflections mention rest and boundaries more often.
                            You might find it useful to explore those themes with your therapist.
                        </p>

                    </div>

                </div>


                <a href="/therapist"
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 text-[10px] font-semibold text-[#5C91A0] shadow-sm transition hover:bg-[#F9FEFF]">
                    Explore with therapist
                    <x-tabler-arrow-right class="h-3.5 w-3.5" />
                </a>

            </div>

        </section>


        {{-- bottom breathing room --}}
        <div class="h-10"></div>

    </main>

</div>