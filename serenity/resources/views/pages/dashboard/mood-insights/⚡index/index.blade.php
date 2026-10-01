{{-- resources/views/livewire/wellness/mood-insights.blade.php --}}

<div class="min-h-screen bg-[#F4FAFC]">

    {{-- =========================================================
    HEADER
    ========================================================== --}}

    <header class="border-b border-[#DCECEF] bg-[#F9FCFD]">

        <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8 lg:px-10">

            <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">

                <div>

                    <div
                        class="mb-3 flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#8AA4AE]">
                        <span>Wellness</span>
                        <x-tabler-chevron-right class="h-3 w-3" />
                        <span>Mood insights</span>
                    </div>

                    <h1 class="text-3xl font-semibold tracking-[-0.045em] text-[#294A5B] sm:text-4xl">
                        Your mood, over time
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-[#8198A2]">
                        Notice patterns in how you've been feeling.
                        There are no good or bad moods here—just information about you.
                    </p>

                </div>


                {{-- Period selector --}}
                <div class="flex items-center gap-2">

                    <button
                        class="flex items-center gap-2 rounded-xl border border-[#DCECEF] bg-white px-3.5 py-2.5 text-[9px] font-semibold text-[#698893]">
                        <x-tabler-calendar class="h-3.5 w-3.5" />
                        Last 30 days
                        <x-tabler-chevron-down class="h-3 w-3" />
                    </button>

                    <button
                        class="flex h-9 w-9 items-center justify-center rounded-xl border border-[#DCECEF] bg-white text-[#91A5AC]">
                        <x-tabler-download class="h-4 w-4" />
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
        CURRENT STATE
        ====================================================== --}}

        <section class="relative overflow-hidden rounded-[30px] border border-[#D5E9ED] bg-white">

            <div class="absolute -right-32 -top-36 h-96 w-96 rounded-full bg-[#E5F5F8] blur-3xl"></div>

            <div class="relative grid lg:grid-cols-[1fr_360px]">

                {{-- Main feeling --}}
                <div class="p-7 sm:p-9 lg:p-10">

                    <div class="flex items-center gap-2">

                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-[#EAF6F8] px-3 py-1.5 text-[8px] font-bold uppercase tracking-[0.16em] text-[#6799A8]">

                            <span class="h-1.5 w-1.5 rounded-full bg-[#71B294]"></span>

                            Current picture

                        </span>

                    </div>


                    <div class="mt-7 flex flex-col gap-6 sm:flex-row sm:items-center">

                        <div
                            class="relative flex h-28 w-28 shrink-0 items-center justify-center rounded-full bg-[#EAF6F8]">

                            <div class="absolute inset-3 rounded-full border border-[#D2E9ED]"></div>

                            <div class="text-center">

                                <x-tabler-mood-smile class="mx-auto h-9 w-9 text-[#68A0AF]" />

                                <div class="mt-1 text-[9px] font-semibold text-[#6F929C]">
                                    Mostly okay
                                </div>

                            </div>

                        </div>


                        <div>

                            <h2 class="text-2xl font-semibold tracking-[-0.04em] text-[#416672]">
                                You've had a varied month.
                            </h2>

                            <p class="mt-2 max-w-xl text-sm leading-6 text-[#8399A0]">
                                Your recent check-ins show a mix of calm,
                                neutral, and lower-energy moments. Your last
                                few days have leaned a little more settled.
                            </p>

                            <div class="mt-5 flex flex-wrap gap-2">

                                <span
                                    class="rounded-full bg-[#F1F8F9] px-3 py-1.5 text-[8px] font-medium text-[#77949D]">
                                    28 check-ins
                                </span>

                                <span
                                    class="rounded-full bg-[#F1F8F9] px-3 py-1.5 text-[8px] font-medium text-[#77949D]">
                                    4 weeks
                                </span>

                                <span
                                    class="rounded-full bg-[#F1F8F9] px-3 py-1.5 text-[8px] font-medium text-[#77949D]">
                                    6 moods noticed
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Right summary --}}
                <div class="border-t border-[#E1EFF1] bg-[#F8FCFD] p-7 sm:p-9 lg:border-l lg:border-t-0">

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                        This week
                    </div>


                    <div class="mt-5 grid grid-cols-2 gap-3">

                        <div class="rounded-2xl bg-white p-4">

                            <div class="text-[9px] text-[#9BAEB3]">
                                Check-ins
                            </div>

                            <div class="mt-2 text-2xl font-semibold tracking-[-0.05em] text-[#557A86]">
                                7
                            </div>

                        </div>


                        <div class="rounded-2xl bg-white p-4">

                            <div class="text-[9px] text-[#9BAEB3]">
                                Most noticed
                            </div>

                            <div class="mt-2 flex items-center gap-1.5 text-xs font-semibold text-[#6D909A]">
                                <x-tabler-mood-smile class="h-4 w-4" />
                                Calm
                            </div>

                        </div>

                    </div>


                    <div class="mt-3 rounded-2xl bg-white p-4">

                        <div class="flex items-center justify-between">

                            <span class="text-[9px] font-medium text-[#8299A1]">
                                Check-in rhythm
                            </span>

                            <span class="text-[9px] font-semibold text-[#6B9BA8]">
                                7 / 7
                            </span>

                        </div>


                        <div class="mt-3 flex gap-1.5">

                            @foreach (range(1, 7) as $day)

                                <span class="h-2 flex-1 rounded-full bg-[#77B3C0]"></span>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
        MOOD GRAPH
        ====================================================== --}}

        <section class="mt-5 rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-8">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                        Mood timeline
                    </div>

                    <h2 class="mt-2 text-xl font-semibold tracking-[-0.035em] text-[#4E707B]">
                        How things have been moving
                    </h2>

                </div>


                <div class="flex items-center gap-4">

                    <div class="flex items-center gap-1.5">
                        <span class="h-2 w-2 rounded-full bg-[#79B5C2]"></span>
                        <span class="text-[8px] text-[#8EA3A9]">Mood</span>
                    </div>

                    <div class="flex items-center gap-1.5">
                        <span class="h-2 w-2 rounded-full bg-[#DCECEF]"></span>
                        <span class="text-[8px] text-[#8EA3A9]">Check-in</span>
                    </div>

                </div>

            </div>


            {{-- Chart --}}
            <div class="mt-8 overflow-hidden">

                <div class="relative h-64">

                    {{-- Horizontal guides --}}
                    <div class="absolute inset-0 flex flex-col justify-between">

                        @foreach (['Elevated', 'Good', 'Okay', 'Low', 'Very low'] as $label)

                            <div class="flex items-center gap-3">

                                <span class="w-12 text-right text-[7px] text-[#A7B4B8]">
                                    {{ $label }}
                                </span>

                                <div class="h-px flex-1 bg-[#EDF2F3]"></div>

                            </div>

                        @endforeach

                    </div>


                    {{-- Fake SVG chart --}}
                    <div class="absolute bottom-0 left-[65px] right-0 top-0">

                        <svg viewBox="0 0 1000 240" class="h-full w-full overflow-visible" preserveAspectRatio="none">

                            <defs>

                                <linearGradient id="moodFill" x1="0" x2="0" y1="0" y2="1">

                                    <stop offset="0%" stop-color="#BFE3E9" stop-opacity=".55" />

                                    <stop offset="100%" stop-color="#BFE3E9" stop-opacity="0" />

                                </linearGradient>

                            </defs>


                            <path d="M0,135
                                   C45,145 60,105 90,118
                                   S140,150 170,125
                                   S210,88 245,105
                                   S280,130 315,92
                                   S355,70 385,90
                                   S430,120 460,108
                                   S500,80 530,96
                                   S565,125 600,105
                                   S645,82 680,95
                                   S720,65 750,74
                                   S790,108 820,85
                                   S860,58 900,70
                                   S950,45 1000,58
                                   L1000,240
                                   L0,240 Z" fill="url(#moodFill)" />


                            <path d="M0,135
                                   C45,145 60,105 90,118
                                   S140,150 170,125
                                   S210,88 245,105
                                   S280,130 315,92
                                   S355,70 385,90
                                   S430,120 460,108
                                   S500,80 530,96
                                   S565,125 600,105
                                   S645,82 680,95
                                   S720,65 750,74
                                   S790,108 820,85
                                   S860,58 900,70
                                   S950,45 1000,58" fill="none" stroke="#75B1BE" stroke-width="3"
                                vector-effect="non-scaling-stroke" />


                            @foreach ([
                                    [90, 118],
                                    [170, 125],
                                    [245, 105],
                                    [315, 92],
                                    [385, 90],
                                    [460, 108],
                                    [530, 96],
                                    [600, 105],
                                    [680, 95],
                                    [750, 74],
                                    [820, 85],
                                    [900, 70],
                                    [1000, 58]
                                ] as $point)

                                <circle cx="{{ $point[0] }}" cy="{{ $point[1] }}" r="5" fill="#FFFFFF" stroke="#70ADBA"
                                    stroke-width="3" />

                            @endforeach

                        </svg>

                    </div>

                </div>


                <div class="ml-[65px] mt-3 flex justify-between">

                    @foreach (['Sep 4', 'Sep 8', 'Sep 12', 'Sep 16', 'Sep 20', 'Sep 24', 'Sep 28', 'Today'] as $date)

                        <span class="text-[7px] text-[#A5B1B5]">
                            {{ $date }}
                        </span>

                    @endforeach

                </div>

            </div>


            <div class="mt-7 flex flex-col gap-3 rounded-2xl bg-[#F7FAFB] p-4 sm:flex-row sm:items-center">

                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#E8F5F7] text-[#69A0AE]">
                    <x-tabler-sparkles class="h-4 w-4" />
                </div>

                <p class="text-[9px] leading-4 text-[#8A9EA5]">
                    <span class="font-semibold text-[#688C96]">Something to notice:</span>
                    your check-ins have been a little more settled during
                    the last week than they were at the beginning of the month.
                </p>

            </div>

        </section>



        {{-- =====================================================
        MOOD DISTRIBUTION
        ====================================================== --}}

        <section class="mt-5 grid gap-5 lg:grid-cols-[1fr_1fr]">


            {{-- Distribution --}}
            <div class="rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-7">

                <div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                        Your moods
                    </div>

                    <h2 class="mt-2 text-lg font-semibold tracking-[-0.03em] text-[#52727D]">
                        What you've noticed most
                    </h2>

                </div>


                <div class="mt-7 space-y-4">

                    @foreach ([
                            ['label' => 'Calm', 'count' => 11, 'percent' => 39, 'width' => 78, 'icon' => 'mood-smile'],
                            ['label' => 'Okay', 'count' => 8, 'percent' => 29, 'width' => 58, 'icon' => 'mood-neutral'],
                            ['label' => 'Low energy', 'count' => 5, 'percent' => 18, 'width' => 36, 'icon' => 'battery'],
                            ['label' => 'Anxious', 'count' => 3, 'percent' => 11, 'width' => 22, 'icon' => 'activity'],
                            ['label' => 'Frustrated', 'count' => 1, 'percent' => 3, 'width' => 6, 'icon' => 'mood-confuzed'],
                        ] as $mood)

                        <div>

                            <div class="flex items-center justify-between">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#F2F8F9] text-[#78A0A8]">

                                        @if ($mood['icon'] === 'mood-smile')
                                            <x-tabler-mood-smile class="h-3.5 w-3.5" />
                                        @elseif ($mood['icon'] === 'mood-neutral')
                                            <x-tabler-mood-neutral class="h-3.5 w-3.5" />
                                        @elseif ($mood['icon'] === 'battery')
                                            <x-tabler-battery class="h-3.5 w-3.5" />
                                        @elseif ($mood['icon'] === 'activity')
                                            <x-tabler-activity class="h-3.5 w-3.5" />
                                        @else
                                            <x-tabler-mood-confuzed class="h-3.5 w-3.5" />
                                        @endif

                                    </div>

                                    <span class="text-[9px] font-medium text-[#718A93]">
                                        {{ $mood['label'] }}
                                    </span>

                                </div>

                                <span class="text-[8px] text-[#9AA9AE]">
                                    {{ $mood['count'] }} check-ins · {{ $mood['percent'] }}%
                                </span>

                            </div>


                            <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-[#EDF3F4]">

                                <div class="h-full rounded-full bg-[#9BCBD3]" style="width: {{ $mood['width'] }}%"></div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>



            {{-- Time of day --}}
            <div class="rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-7">

                <div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                        Time of day
                    </div>

                    <h2 class="mt-2 text-lg font-semibold tracking-[-0.03em] text-[#52727D]">
                        When you tend to check in
                    </h2>

                </div>


                <div class="mt-8 flex items-end justify-between gap-3">

                    @foreach ([
                            ['label' => 'Morning', 'height' => 54, 'value' => '24%'],
                            ['label' => 'Midday', 'height' => 82, 'value' => '34%'],
                            ['label' => 'Afternoon', 'height' => 64, 'value' => '27%'],
                            ['label' => 'Evening', 'height' => 91, 'value' => '38%'],
                            ['label' => 'Night', 'height' => 38, 'value' => '16%'],
                        ] as $time)

                        <div class="flex flex-1 flex-col items-center">

                            <div class="flex h-40 w-full items-end justify-center">

                                <div class="w-full max-w-[42px] rounded-t-xl bg-[#D9EDF1]"
                                    style="height: {{ $time['height'] }}%"></div>

                            </div>

                            <div class="mt-3 text-[7px] font-medium text-[#91A5AB]">
                                {{ $time['label'] }}
                            </div>

                            <div class="mt-1 text-[8px] font-semibold text-[#6E929C]">
                                {{ $time['value'] }}
                            </div>

                        </div>

                    @endforeach

                </div>


                <div class="mt-6 rounded-2xl bg-[#F7FAFB] p-4">

                    <div class="flex items-start gap-2.5">

                        <x-tabler-clock class="mt-0.5 h-3.5 w-3.5 shrink-0 text-[#82A4AC]" />

                        <p class="text-[9px] leading-4 text-[#8B9FA5]">
                            You check in most often in the
                            <span class="font-semibold text-[#6E9099]">evening</span>.
                            That may simply be when you have more space to reflect.
                        </p>

                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
        CONTEXT PATTERNS
        ====================================================== --}}

        <section class="mt-5 rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-8">

            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">

                <div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                        Context
                    </div>

                    <h2 class="mt-2 text-xl font-semibold tracking-[-0.035em] text-[#4E707B]">
                        What was happening around your check-ins?
                    </h2>

                    <p class="mt-1 max-w-xl text-[10px] leading-5 text-[#99AAB0]">
                        These are simple associations from what you've logged.
                        They aren't explanations or diagnoses.
                    </p>

                </div>


                <button class="text-[9px] font-semibold text-[#6796A4]">
                    Explore patterns
                </button>

            </div>


            <div class="mt-6 grid gap-3 md:grid-cols-3">


                {{-- Pattern --}}
                <div class="rounded-[22px] border border-[#E2ECEE] bg-[#FAFCFD] p-5">

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#EAF6F8] text-[#6B9EAC]">
                        <x-tabler-moon class="h-4 w-4" />
                    </div>

                    <div class="mt-5 text-[8px] font-bold uppercase tracking-[0.14em] text-[#99A9AE]">
                        Sleep
                    </div>

                    <div class="mt-2 text-sm font-semibold text-[#607E88]">
                        6.8 hrs average
                    </div>

                    <p class="mt-2 text-[9px] leading-4 text-[#97A8AD]">
                        On days you logged less sleep,
                        you more often marked your energy as low.
                    </p>

                    <div
                        class="mt-4 inline-flex rounded-full bg-[#F0F7F8] px-2.5 py-1 text-[7px] font-medium text-[#77969E]">
                        Based on 12 entries
                    </div>

                </div>



                {{-- Pattern --}}
                <div class="rounded-[22px] border border-[#E2ECEE] bg-[#FAFCFD] p-5">

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#F0F7F4] text-[#70A08B]">
                        <x-tabler-leaf-2 class="h-4 w-4" />
                    </div>

                    <div class="mt-5 text-[8px] font-bold uppercase tracking-[0.14em] text-[#99A9AE]">
                        Rituals
                    </div>

                    <div class="mt-2 text-sm font-semibold text-[#607E88]">
                        4 of 5 days
                    </div>

                    <p class="mt-2 text-[9px] leading-4 text-[#97A8AD]">
                        You completed a wellness ritual
                        on most days you marked yourself as calm.
                    </p>

                    <div
                        class="mt-4 inline-flex rounded-full bg-[#F1F8F4] px-2.5 py-1 text-[7px] font-medium text-[#779889]">
                        Based on 18 entries
                    </div>

                </div>



                {{-- Pattern --}}
                <div class="rounded-[22px] border border-[#E2ECEE] bg-[#FAFCFD] p-5">

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#F3EFF8] text-[#8D7B9E]">
                        <x-tabler-message-heart class="h-4 w-4" />
                    </div>

                    <div class="mt-5 text-[8px] font-bold uppercase tracking-[0.14em] text-[#99A9AE]">
                        Connection
                    </div>

                    <div class="mt-2 text-sm font-semibold text-[#607E88]">
                        More settled
                    </div>

                    <p class="mt-2 text-[9px] leading-4 text-[#97A8AD]">
                        Your entries after therapy sessions
                        have often included calmer or more reflective moods.
                    </p>

                    <div
                        class="mt-4 inline-flex rounded-full bg-[#F5F1F8] px-2.5 py-1 text-[7px] font-medium text-[#8D7F98]">
                        Based on 7 entries
                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
        RECENT CHECK-INS
        ====================================================== --}}

        <section class="mt-5 rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-8">

            <div class="flex items-center justify-between">

                <div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#94A8AE]">
                        Recent check-ins
                    </div>

                    <h2 class="mt-2 text-lg font-semibold tracking-[-0.03em] text-[#52727D]">
                        A closer look
                    </h2>

                </div>

                <button class="flex items-center gap-1.5 text-[9px] font-semibold text-[#6796A4]">
                    View all
                    <x-tabler-arrow-right class="h-3.5 w-3.5" />
                </button>

            </div>


            <div class="mt-5 overflow-x-auto">

                <div class="min-w-[620px]">

                    {{-- Header --}}
                    <div class="grid grid-cols-[130px_120px_1fr_100px] border-b border-[#E8EFF1] px-4 pb-3">

                        <span class="text-[8px] font-bold uppercase tracking-wider text-[#A0AEB2]">
                            Date
                        </span>

                        <span class="text-[8px] font-bold uppercase tracking-wider text-[#A0AEB2]">
                            Mood
                        </span>

                        <span class="text-[8px] font-bold uppercase tracking-wider text-[#A0AEB2]">
                            Note
                        </span>

                        <span class="text-right text-[8px] font-bold uppercase tracking-wider text-[#A0AEB2]">
                            Time
                        </span>

                    </div>


                    @foreach ([
                            ['date' => 'Oct 1', 'mood' => 'Calm', 'icon' => 'mood-smile', 'note' => 'Feeling more grounded this morning.', 'time' => '9:14 AM'],
                            ['date' => 'Sep 30', 'mood' => 'Okay', 'icon' => 'mood-neutral', 'note' => 'A little tired, but manageable.', 'time' => '8:24 AM'],
                            ['date' => 'Sep 29', 'mood' => 'Calm', 'icon' => 'mood-smile', 'note' => 'Had some quiet time before work.', 'time' => '7:58 PM'],
                            ['date' => 'Sep 28', 'mood' => 'Low energy', 'icon' => 'battery', 'note' => 'Sleep was not great last night.', 'time' => '9:17 PM'],
                            ['date' => 'Sep 27', 'mood' => 'Calm', 'icon' => 'mood-smile', 'note' => 'The breathing ritual helped me slow down.', 'time' => '10:02 AM'],
                        ] as $checkin)

                        <div
                            class="grid grid-cols-[130px_120px_1fr_100px] items-center border-b border-[#EEF2F3] px-4 py-4">

                            <span class="text-[9px] font-medium text-[#718A93]">
                                {{ $checkin['date'] }}
                            </span>


                            <span class="inline-flex items-center gap-1.5 text-[9px] font-medium text-[#78949C]">

                                @if ($checkin['icon'] === 'mood-smile')
                                    <x-tabler-mood-smile class="h-3.5 w-3.5 text-[#72A6B2]" />
                                @elseif ($checkin['icon'] === 'mood-neutral')
                                    <x-tabler-mood-neutral class="h-3.5 w-3.5 text-[#8CA2A8]" />
                                @else
                                    <x-tabler-battery class="h-3.5 w-3.5 text-[#9B8E75]" />
                                @endif

                                {{ $checkin['mood'] }}

                            </span>


                            <span class="truncate pr-5 text-[9px] text-[#9AA9AE]">
                                {{ $checkin['note'] }}
                            </span>


                            <span class="text-right text-[8px] text-[#A1AFB3]">
                                {{ $checkin['time'] }}
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>



        {{-- =====================================================
        REFLECTION
        ====================================================== --}}

        <section class="relative mt-5 overflow-hidden rounded-[28px] border border-[#D6E9EC] bg-[#EAF6F8]">

            <div class="absolute -right-20 -top-20 h-52 w-52 rounded-full bg-white/40 blur-3xl"></div>

            <div class="relative flex flex-col gap-5 p-6 sm:p-8 md:flex-row md:items-center md:justify-between">

                <div class="flex gap-4">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white text-[#69A0AE]">
                        <x-tabler-sparkles class="h-5 w-5" />
                    </div>

                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#789EA7]">
                            Take a moment
                        </div>

                        <h3 class="mt-2 text-sm font-semibold text-[#527580]">
                            What are you noticing about yourself lately?
                        </h3>

                        <p class="mt-1 text-[9px] leading-4 text-[#78959E]">
                            Your insights are a starting point for reflection,
                            not a conclusion about how you're doing.
                        </p>

                    </div>

                </div>


                <button
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-4 py-2.5 text-[9px] font-semibold text-[#638F9E] shadow-sm">
                    <x-tabler-pencil class="h-3.5 w-3.5" />
                    Reflect in journal
                </button>

            </div>

        </section>


        <div class="h-10"></div>

    </main>

</div>