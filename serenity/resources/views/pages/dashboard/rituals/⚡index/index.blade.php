{{-- resources/views/livewire/wellness/rituals.blade.php --}}

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
                        <span>Rituals</span>
                    </div>

                    <h1 class="text-3xl font-semibold tracking-[-0.045em] text-[#294A5B] sm:text-4xl">
                        Your rituals
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-[#8198A2]">
                        Small moments of care, repeated gently.
                        Build a rhythm that helps you feel more like yourself.
                    </p>

                </div>


                <button
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#5AA7C2] px-5 py-3 text-xs font-semibold text-white shadow-[0_8px_24px_rgba(90,167,194,.15)] transition hover:-translate-y-0.5 hover:bg-[#4D99B4]">
                    <x-tabler-plus class="h-4 w-4" />
                    Create ritual
                </button>

            </div>

        </div>

    </header>



    {{-- =========================================================
    MAIN
    ========================================================== --}}

    <main class="mx-auto max-w-7xl px-5 py-8 sm:px-8 lg:px-10">


        {{-- =====================================================
        TODAY'S RITUAL
        ====================================================== --}}

        <section class="relative overflow-hidden rounded-[30px] border border-[#D4E9ED] bg-white">

            {{-- ambient background --}}
            <div class="absolute -right-28 -top-36 h-96 w-96 rounded-full bg-[#E1F4F7] blur-3xl"></div>
            <div class="absolute -bottom-40 left-1/4 h-80 w-80 rounded-full bg-[#EDF7F2] blur-3xl"></div>

            <div class="relative grid lg:grid-cols-[1fr_340px]">

                {{-- Main ritual --}}
                <div class="p-7 sm:p-9 lg:p-10">

                    <div class="flex items-center gap-2">

                        <span
                            class="inline-flex items-center gap-2 rounded-full bg-[#E7F5F7] px-3 py-1.5 text-[9px] font-bold uppercase tracking-[0.14em] text-[#6097A7]">

                            <span class="h-1.5 w-1.5 rounded-full bg-[#6EB297]"></span>

                            Today's ritual

                        </span>

                    </div>


                    <div class="mt-7 flex flex-col gap-6 sm:flex-row sm:items-start">

                        {{-- Ritual icon --}}
                        <div
                            class="flex h-20 w-20 shrink-0 items-center justify-center rounded-[26px] bg-[#E8F6F8] text-[#64A0B1]">

                            <x-tabler-sunrise class="h-9 w-9" />

                        </div>


                        <div class="max-w-xl">

                            <h2 class="text-2xl font-semibold tracking-[-0.04em] text-[#365B68]">
                                Gentle morning grounding
                            </h2>

                            <p class="mt-2 text-sm leading-6 text-[#8198A2]">
                                Begin the day without rushing into it.
                                Give yourself a few quiet minutes to notice
                                where you are.
                            </p>


                            <div class="mt-5 flex flex-wrap gap-2">

                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-[#F5FAFB] px-3 py-1.5 text-[9px] font-medium text-[#718D96]">
                                    <x-tabler-clock class="h-3.5 w-3.5" />
                                    5 minutes
                                </span>

                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-[#F5FAFB] px-3 py-1.5 text-[9px] font-medium text-[#718D96]">
                                    <x-tabler-leaf-2 class="h-3.5 w-3.5" />
                                    Grounding
                                </span>

                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-[#F5FAFB] px-3 py-1.5 text-[9px] font-medium text-[#718D96]">
                                    <x-tabler-sun class="h-3.5 w-3.5" />
                                    Morning
                                </span>

                            </div>

                        </div>

                    </div>


                    <div class="mt-8">

                        <button
                            class="inline-flex items-center gap-2 rounded-xl bg-[#5AA7C2] px-5 py-3 text-xs font-semibold text-white transition hover:bg-[#4D99B4]">
                            Begin ritual
                            <x-tabler-arrow-right class="h-4 w-4" />
                        </button>

                        <button
                            class="ml-2 inline-flex items-center gap-2 rounded-xl border border-[#DCECEF] bg-white px-5 py-3 text-xs font-semibold text-[#6D8992]">
                            View steps
                        </button>

                    </div>

                </div>


                {{-- Progress --}}
                <div class="border-t border-[#E1EFF1] bg-[#F8FCFD] p-7 sm:p-9 lg:border-l lg:border-t-0">

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#91A7AE]">
                        Your rhythm
                    </div>


                    <div class="mt-5 flex items-end gap-2">

                        <span class="text-5xl font-semibold tracking-[-0.07em] text-[#527985]">
                            12
                        </span>

                        <span class="mb-2 text-xs text-[#92A5AB]">
                            days
                        </span>

                    </div>

                    <p class="mt-1 text-[10px] text-[#98A9AE]">
                        of gentle consistency
                    </p>


                    {{-- Mini calendar --}}
                    <div class="mt-7 grid grid-cols-7 gap-1.5">

                        @foreach (['M', 'T', 'W', 'T', 'F', 'S', 'S'] as $day)
                            <div class="text-center text-[7px] font-bold text-[#A4B2B6]">
                                {{ $day }}
                            </div>
                        @endforeach


                        @foreach (range(1, 21) as $day)

                                            <div class="
                                                                                                                    flex aspect-square items-center justify-center rounded-lg text-[8px] font-medium
                                                                                                                    {{ in_array($day, [1, 2, 3, 4, 5, 7, 8, 9, 10, 11, 14, 15, 16, 17])
                            ? 'bg-[#DCEFF2] text-[#6094A2]'
                            : 'bg-white text-[#AAB6BA] border border-[#EDF2F3]' }}
                                                                                                                ">
                                                {{ $day }}
                                            </div>

                        @endforeach

                    </div>


                    <p class="mt-5 text-[9px] leading-4 text-[#93A6AC]">
                        Consistency doesn't mean perfection.
                        Missing a day doesn't erase your progress.
                    </p>

                </div>

            </div>

        </section>



        {{-- =====================================================
        QUICK STATS
        ====================================================== --}}

        <section class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ([
                    ['value' => '4', 'label' => 'Active rituals', 'icon' => 'sparkles'],
                    ['value' => '12', 'label' => 'Current rhythm', 'icon' => 'flame'],
                    ['value' => '86%', 'label' => 'This month', 'icon' => 'chart'],
                    ['value' => '18', 'label' => 'Minutes today', 'icon' => 'clock'],
                ] as $stat)

                <div class="rounded-[22px] border border-[#DCECEF] bg-white p-5">

                    <div class="flex items-center justify-between">

                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#EFF7F9] text-[#68A3B4]">

                            @if ($stat['icon'] === 'sparkles')
                                <x-tabler-sparkles class="h-4 w-4" />
                            @elseif ($stat['icon'] === 'flame')
                                <x-tabler-flame class="h-4 w-4" />
                            @elseif ($stat['icon'] === 'chart')
                                <x-tabler-chart-line class="h-4 w-4" />
                            @else
                                <x-tabler-clock class="h-4 w-4" />
                            @endif

                        </div>

                        <x-tabler-arrow-up-right class="h-3.5 w-3.5 text-[#B0BDC1]" />

                    </div>

                    <div class="mt-5 text-2xl font-semibold tracking-tight text-[#456A77]">
                        {{ $stat['value'] }}
                    </div>

                    <div class="mt-1 text-[10px] font-medium text-[#91A4AA]">
                        {{ $stat['label'] }}
                    </div>

                </div>

            @endforeach

        </section>



        {{-- =====================================================
        MY RITUALS
        ====================================================== --}}

        <section class="mt-8">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>

                    <div class="flex items-center gap-2">

                        <h2 class="text-sm font-semibold text-[#4E6E79]">
                            My rituals
                        </h2>

                        <span class="rounded-full bg-[#EAF6F8] px-2 py-1 text-[8px] font-bold text-[#6799A7]">
                            4 active
                        </span>

                    </div>

                    <p class="mt-1 text-[10px] text-[#99AAB0]">
                        Small practices you've chosen for yourself.
                    </p>

                </div>


                <div class="flex gap-2">

                    <button
                        class="rounded-xl border border-[#DCECEF] bg-white px-3 py-2 text-[9px] font-semibold text-[#718A94]">
                        All
                    </button>

                    <button class="rounded-xl px-3 py-2 text-[9px] font-medium text-[#9AA9AE]">
                        Morning
                    </button>

                    <button class="rounded-xl px-3 py-2 text-[9px] font-medium text-[#9AA9AE]">
                        Evening
                    </button>

                </div>

            </div>



            <div class="mt-4 grid gap-3 md:grid-cols-2">


                {{-- Ritual --}}
                <article
                    class="group rounded-[25px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(67,116,130,.06)]">

                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-[17px] bg-[#EAF6F8] text-[#66A0B0]">
                            <x-tabler-sunrise class="h-5 w-5" />
                        </div>


                        <div class="min-w-0 flex-1">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <h3 class="text-xs font-semibold text-[#587580]">
                                        Gentle morning grounding
                                    </h3>

                                    <p class="mt-1 text-[9px] text-[#98A9AE]">
                                        Every morning · 5 min
                                    </p>

                                </div>

                                <button
                                    class="flex h-7 w-7 items-center justify-center rounded-lg text-[#A0B0B5] opacity-0 transition group-hover:opacity-100">
                                    <x-tabler-dots class="h-4 w-4" />
                                </button>

                            </div>


                            <div class="mt-4 flex items-center justify-between">

                                <div class="flex items-center gap-1.5">

                                    @foreach (range(1, 7) as $day)

                                        <span
                                            class="h-2 w-2 rounded-full {{ $day < 6 ? 'bg-[#77B4C2]' : 'bg-[#E3EEF0]' }}"></span>

                                    @endforeach

                                </div>

                                <span class="text-[8px] font-semibold text-[#79A0A8]">
                                    5 / 7
                                </span>

                            </div>

                        </div>

                    </div>

                </article>



                {{-- Ritual --}}
                <article
                    class="group rounded-[25px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(67,116,130,.06)]">

                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-[17px] bg-[#F0F7F4] text-[#70A28B]">
                            <x-tabler-heart class="h-5 w-5" />
                        </div>


                        <div class="min-w-0 flex-1">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <h3 class="text-xs font-semibold text-[#587580]">
                                        Evening gratitude
                                    </h3>

                                    <p class="mt-1 text-[9px] text-[#98A9AE]">
                                        Every evening · 3 min
                                    </p>

                                </div>

                                <button
                                    class="flex h-7 w-7 items-center justify-center rounded-lg text-[#A0B0B5] opacity-0 transition group-hover:opacity-100">
                                    <x-tabler-dots class="h-4 w-4" />
                                </button>

                            </div>


                            <div class="mt-4 flex items-center justify-between">

                                <div class="flex items-center gap-1.5">

                                    @foreach (range(1, 7) as $day)

                                        <span
                                            class="h-2 w-2 rounded-full {{ $day <= 7 ? 'bg-[#83B39B]' : 'bg-[#E3EEF0]' }}"></span>

                                    @endforeach

                                </div>

                                <span class="text-[8px] font-semibold text-[#79A08C]">
                                    7 / 7
                                </span>

                            </div>

                        </div>

                    </div>

                </article>



                {{-- Ritual --}}
                <article
                    class="group rounded-[25px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(67,116,130,.06)]">

                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-[17px] bg-[#F3EFF8] text-[#8B78A0]">
                            <x-tabler-wind class="h-5 w-5" />
                        </div>


                        <div class="min-w-0 flex-1">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <h3 class="text-xs font-semibold text-[#587580]">
                                        Five-minute breathing
                                    </h3>

                                    <p class="mt-1 text-[9px] text-[#98A9AE]">
                                        Weekdays · 5 min
                                    </p>

                                </div>

                                <button
                                    class="flex h-7 w-7 items-center justify-center rounded-lg text-[#A0B0B5] opacity-0 transition group-hover:opacity-100">
                                    <x-tabler-dots class="h-4 w-4" />
                                </button>

                            </div>


                            <div class="mt-4 flex items-center justify-between">

                                <div class="flex items-center gap-1.5">

                                    @foreach (range(1, 7) as $day)

                                        <span
                                            class="h-2 w-2 rounded-full {{ in_array($day, [1, 2, 3, 5, 6]) ? 'bg-[#A08FB2]' : 'bg-[#E3EEF0]' }}"></span>

                                    @endforeach

                                </div>

                                <span class="text-[8px] font-semibold text-[#8B789B]">
                                    5 / 7
                                </span>

                            </div>

                        </div>

                    </div>

                </article>



                {{-- Ritual --}}
                <article
                    class="group rounded-[25px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(67,116,130,.06)]">

                    <div class="flex items-start gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-[17px] bg-[#F8F2E8] text-[#B29567]">
                            <x-tabler-moon class="h-5 w-5" />
                        </div>


                        <div class="min-w-0 flex-1">

                            <div class="flex items-start justify-between gap-3">

                                <div>

                                    <h3 class="text-xs font-semibold text-[#587580]">
                                        Quiet evening wind-down
                                    </h3>

                                    <p class="mt-1 text-[9px] text-[#98A9AE]">
                                        Every night · 10 min
                                    </p>

                                </div>

                                <button
                                    class="flex h-7 w-7 items-center justify-center rounded-lg text-[#A0B0B5] opacity-0 transition group-hover:opacity-100">
                                    <x-tabler-dots class="h-4 w-4" />
                                </button>

                            </div>


                            <div class="mt-4 flex items-center justify-between">

                                <div class="flex items-center gap-1.5">

                                    @foreach (range(1, 7) as $day)

                                        <span
                                            class="h-2 w-2 rounded-full {{ $day <= 4 ? 'bg-[#C0A878]' : 'bg-[#E3EEF0]' }}"></span>

                                    @endforeach

                                </div>

                                <span class="text-[8px] font-semibold text-[#A38D68]">
                                    4 / 7
                                </span>

                            </div>

                        </div>

                    </div>

                </article>

            </div>

        </section>



        {{-- =====================================================
        DISCOVER RITUALS
        ====================================================== --}}

        <section class="mt-8">

            <div class="flex items-end justify-between">

                <div>

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#91A6AD]">
                        Explore
                    </div>

                    <h2 class="mt-2 text-xl font-semibold tracking-[-0.03em] text-[#4E6E79]">
                        Maybe today needs something different.
                    </h2>

                    <p class="mt-1 text-[10px] text-[#99AAB0]">
                        Try a gentle practice without committing to a new routine.
                    </p>

                </div>

                <button class="hidden text-[10px] font-semibold text-[#6095A4] sm:block">
                    Explore all
                </button>

            </div>


            <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">


                {{-- Explore card --}}
                <button
                    class="group rounded-[25px] border border-[#DCECEF] bg-white p-5 text-left transition hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(67,116,130,.07)]">

                    <div class="flex h-11 w-11 items-center justify-center rounded-[15px] bg-[#E8F6F8] text-[#66A1B1]">
                        <x-tabler-cloud-star class="h-5 w-5" />
                    </div>

                    <h3 class="mt-5 text-xs font-semibold text-[#5C7882]">
                        Reset your afternoon
                    </h3>

                    <p class="mt-1 text-[9px] leading-4 text-[#9AAAB0]">
                        A 3-minute pause for when the day feels noisy.
                    </p>

                    <div class="mt-4 flex items-center gap-1.5 text-[8px] font-semibold text-[#6A99A7]">
                        3 min
                        <x-tabler-arrow-right class="h-3 w-3" />
                    </div>

                </button>



                {{-- Explore card --}}
                <button
                    class="group rounded-[25px] border border-[#DCECEF] bg-white p-5 text-left transition hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(67,116,130,.07)]">

                    <div class="flex h-11 w-11 items-center justify-center rounded-[15px] bg-[#F0F7F4] text-[#70A28B]">
                        <x-tabler-flower class="h-5 w-5" />
                    </div>

                    <h3 class="mt-5 text-xs font-semibold text-[#5C7882]">
                        Practice self-kindness
                    </h3>

                    <p class="mt-1 text-[9px] leading-4 text-[#9AAAB0]">
                        A short reflection for gentler self-talk.
                    </p>

                    <div class="mt-4 flex items-center gap-1.5 text-[8px] font-semibold text-[#709989]">
                        7 min
                        <x-tabler-arrow-right class="h-3 w-3" />
                    </div>

                </button>



                {{-- Explore card --}}
                <button
                    class="group rounded-[25px] border border-[#DCECEF] bg-white p-5 text-left transition hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(67,116,130,.07)]">

                    <div class="flex h-11 w-11 items-center justify-center rounded-[15px] bg-[#F3EFF8] text-[#8B78A0]">
                        <x-tabler-ripple class="h-5 w-5" />
                    </div>

                    <h3 class="mt-5 text-xs font-semibold text-[#5C7882]">
                        Release the tension
                    </h3>

                    <p class="mt-1 text-[9px] leading-4 text-[#9AAAB0]">
                        A guided breathing practice to slow things down.
                    </p>

                    <div class="mt-4 flex items-center gap-1.5 text-[8px] font-semibold text-[#8A789A]">
                        5 min
                        <x-tabler-arrow-right class="h-3 w-3" />
                    </div>

                </button>



                {{-- Explore card --}}
                <button
                    class="group rounded-[25px] border border-[#DCECEF] bg-white p-5 text-left transition hover:-translate-y-1 hover:shadow-[0_12px_30px_rgba(67,116,130,.07)]">

                    <div class="flex h-11 w-11 items-center justify-center rounded-[15px] bg-[#F8F2E8] text-[#B29567]">
                        <x-tabler-moon-stars class="h-5 w-5" />
                    </div>

                    <h3 class="mt-5 text-xs font-semibold text-[#5C7882]">
                        Prepare for sleep
                    </h3>

                    <p class="mt-1 text-[9px] leading-4 text-[#9AAAB0]">
                        Leave the day behind with a quiet wind-down.
                    </p>

                    <div class="mt-4 flex items-center gap-1.5 text-[8px] font-semibold text-[#A38D68]">
                        10 min
                        <x-tabler-arrow-right class="h-3 w-3" />
                    </div>

                </button>

            </div>

        </section>



        {{-- =====================================================
        GENTLE REMINDER
        ====================================================== --}}

        <section class="mt-6 overflow-hidden rounded-[26px] border border-[#D6E9EC] bg-[#EAF6F8]">

            <div class="relative flex flex-col gap-6 p-6 sm:p-8 md:flex-row md:items-center md:justify-between">

                <div class="absolute -right-10 -top-20 h-40 w-40 rounded-full bg-white/40 blur-2xl"></div>

                <div class="relative flex gap-4">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white text-[#68A0AE]">
                        <x-tabler-heart-handshake class="h-5 w-5" />
                    </div>

                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#779EA7]">
                            A little reminder
                        </div>

                        <h3 class="mt-2 text-sm font-semibold text-[#527580]">
                            Your rituals are invitations, not obligations.
                        </h3>

                        <p class="mt-1 max-w-2xl text-xs leading-5 text-[#78959E]">
                            Some days you'll do everything. Some days you'll do
                            one small thing. Both are part of taking care of yourself.
                        </p>

                    </div>

                </div>


                <button
                    class="relative inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-[10px] font-semibold text-[#5D91A0] shadow-sm">
                    <x-tabler-sparkles class="h-3.5 w-3.5" />
                    Find something gentle
                </button>

            </div>

        </section>


        <div class="h-10"></div>

    </main>

</div>