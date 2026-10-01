{{-- resources/views/livewire/sessions.blade.php --}}

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
                        <span>Care</span>
                        <x-tabler-chevron-right class="h-3 w-3" />
                        <span>Sessions</span>
                    </div>

                    <h1 class="text-3xl font-semibold tracking-[-0.04em] text-[#294A5B] sm:text-4xl">
                        Your sessions
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-[#8198A2]">
                        Keep track of upcoming care, revisit past conversations,
                        and carry the useful parts with you.
                    </p>

                </div>


                <div class="flex flex-col gap-2 sm:flex-row">

                    <button
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#DCECEF] bg-white px-4 py-3 text-xs font-semibold text-[#69848E] transition hover:border-[#C6E0E7]">
                        <x-tabler-calendar class="h-4 w-4" />
                        Calendar
                    </button>

                    <button
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#5AA7C2] px-5 py-3 text-xs font-semibold text-white shadow-[0_8px_24px_rgba(90,167,194,.16)] transition hover:-translate-y-0.5 hover:bg-[#4D99B4]">
                        <x-tabler-calendar-plus class="h-4 w-4" />
                        Book a session
                    </button>

                </div>

            </div>

        </div>

    </header>



    {{-- =========================================================
    MAIN
    ========================================================== --}}

    <main class="mx-auto max-w-7xl px-5 py-8 sm:px-8 lg:px-10">


        {{-- =====================================================
        NEXT SESSION HERO
        ====================================================== --}}

        <section class="relative overflow-hidden rounded-[30px] border border-[#D5E9ED] bg-white">

            <div class="absolute -right-20 -top-32 h-80 w-80 rounded-full bg-[#E5F5F8] blur-3xl"></div>
            <div class="absolute -bottom-32 left-1/3 h-64 w-64 rounded-full bg-[#EEF7F3] blur-3xl"></div>


            <div class="relative grid lg:grid-cols-[1.3fr_.7fr]">

                {{-- Session details --}}
                <div class="p-7 sm:p-9 lg:p-10">

                    <div class="flex items-center gap-2">

                        <span
                            class="flex items-center gap-2 rounded-full bg-[#E6F5F7] px-3 py-1.5 text-[9px] font-bold uppercase tracking-[0.13em] text-[#6098A8]">
                            <span class="h-1.5 w-1.5 rounded-full bg-[#65AE91]"></span>
                            Upcoming session
                        </span>

                    </div>


                    <div class="mt-6 flex flex-col gap-7 sm:flex-row sm:items-start">

                        {{-- Date --}}
                        <div class="w-fit rounded-[24px] border border-[#DCECEF] bg-[#F8FCFD] p-4 text-center">

                            <div class="text-[9px] font-bold uppercase tracking-[0.15em] text-[#91A6AE]">
                                OCT
                            </div>

                            <div class="mt-1 text-4xl font-semibold tracking-[-0.05em] text-[#4E7481]">
                                04
                            </div>

                            <div class="mt-1 text-[9px] font-medium text-[#94A6AC]">
                                Sunday
                            </div>

                        </div>


                        <div>

                            <h2 class="text-2xl font-semibold tracking-[-0.035em] text-[#294A5B]">
                                Individual therapy
                            </h2>

                            <p class="mt-2 text-sm text-[#8198A2]">
                                with Dr. Amelia Morgan
                            </p>


                            <div class="mt-5 flex flex-wrap gap-2">

                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-[#F4F9FA] px-3 py-1.5 text-[9px] font-medium text-[#718C95]">
                                    <x-tabler-clock class="h-3.5 w-3.5" />
                                    4:30 PM · 50 min
                                </span>

                                <span
                                    class="inline-flex items-center gap-1.5 rounded-full bg-[#F4F9FA] px-3 py-1.5 text-[9px] font-medium text-[#718C95]">
                                    <x-tabler-video class="h-3.5 w-3.5" />
                                    Video session
                                </span>

                            </div>


                            <div class="mt-6 flex items-center gap-3">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-full bg-[#DDEFF3] text-[10px] font-semibold text-[#6098AA]">
                                    AM
                                </div>

                                <div>

                                    <div class="text-xs font-semibold text-[#5D7882]">
                                        Dr. Amelia Morgan
                                    </div>

                                    <div class="mt-0.5 text-[9px] text-[#9AAAB0]">
                                        Clinical Psychologist
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="mt-8 flex flex-col gap-2 sm:flex-row">

                        <button
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#5AA7C2] px-5 py-3 text-xs font-semibold text-white transition hover:bg-[#4D99B4]">
                            <x-tabler-video class="h-4 w-4" />
                            Join session
                        </button>

                        <button
                            class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#DCECEF] bg-white px-5 py-3 text-xs font-semibold text-[#6D8790] transition hover:border-[#C5E0E7]">
                            <x-tabler-calendar-event class="h-4 w-4" />
                            Manage appointment
                        </button>

                    </div>

                </div>


                {{-- Countdown --}}
                <div
                    class="flex flex-col justify-center border-t border-[#E3EFF1] bg-[#F7FCFD] p-7 sm:p-9 lg:border-l lg:border-t-0">

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#8DA6AE]">
                        Coming up in
                    </div>


                    <div class="mt-4 flex items-end gap-2">

                        <span class="text-5xl font-semibold tracking-[-0.06em] text-[#527986]">
                            3
                        </span>

                        <span class="mb-2 text-sm text-[#879EA6]">
                            days
                        </span>

                    </div>


                    <div class="mt-7 grid grid-cols-3 gap-2">

                        <div class="rounded-2xl border border-[#DFECEF] bg-white p-3 text-center">

                            <div class="text-lg font-semibold text-[#608795]">
                                18
                            </div>

                            <div class="mt-1 text-[8px] uppercase tracking-wider text-[#A0AFB4]">
                                hours
                            </div>

                        </div>


                        <div class="rounded-2xl border border-[#DFECEF] bg-white p-3 text-center">

                            <div class="text-lg font-semibold text-[#608795]">
                                42
                            </div>

                            <div class="mt-1 text-[8px] uppercase tracking-wider text-[#A0AFB4]">
                                minutes
                            </div>

                        </div>


                        <div class="rounded-2xl border border-[#DFECEF] bg-white p-3 text-center">

                            <div class="text-lg font-semibold text-[#608795]">
                                16
                            </div>

                            <div class="mt-1 text-[8px] uppercase tracking-wider text-[#A0AFB4]">
                                seconds
                            </div>

                        </div>

                    </div>


                    <div class="mt-7 rounded-2xl bg-[#EAF6F8] p-4">

                        <div class="flex gap-3">

                            <x-tabler-sparkles class="mt-0.5 h-4 w-4 shrink-0 text-[#6AA5B5]" />

                            <p class="text-[10px] leading-5 text-[#78959E]">
                                Before your session, you might want to
                                <strong class="font-semibold text-[#5D7E88]">
                                    check in with yourself.
                                </strong>
                            </p>

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
                    ['value' => '6', 'label' => 'Sessions this year', 'icon' => 'calendar-heart'],
                    ['value' => '4', 'label' => 'Upcoming', 'icon' => 'calendar-event'],
                    ['value' => '5', 'label' => 'Session notes', 'icon' => 'notes'],
                    ['value' => '3', 'label' => 'Shared resources', 'icon' => 'books'],
                ] as $stat)

                <div class="rounded-[22px] border border-[#DCECEF] bg-white p-5">

                    <div class="flex items-center justify-between">

                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#EFF7F9] text-[#68A3B4]">

                            @if ($stat['icon'] === 'calendar-heart')
                                <x-tabler-calendar-heart class="h-4 w-4" />
                            @elseif ($stat['icon'] === 'calendar-event')
                                <x-tabler-calendar-event class="h-4 w-4" />
                            @elseif ($stat['icon'] === 'notes')
                                <x-tabler-notes class="h-4 w-4" />
                            @else
                                <x-tabler-books class="h-4 w-4" />
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
        SESSION HISTORY
        ====================================================== --}}

        <section class="mt-5 rounded-[28px] border border-[#DCECEF] bg-white p-6 sm:p-7">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h2 class="text-sm font-semibold text-[#4E6E79]">
                        Session history
                    </h2>

                    <p class="mt-1 text-[10px] text-[#99AAB0]">
                        Your previous care sessions
                    </p>

                </div>


                <div class="flex gap-2">

                    <button
                        class="inline-flex items-center gap-2 rounded-xl border border-[#DCECEF] bg-[#FAFCFD] px-3 py-2 text-[10px] font-semibold text-[#718A94]">
                        All sessions
                        <x-tabler-chevron-down class="h-3.5 w-3.5" />
                    </button>

                    <button
                        class="flex h-8 w-8 items-center justify-center rounded-xl border border-[#DCECEF] bg-[#FAFCFD] text-[#91A6AE]">
                        <x-tabler-filter class="h-3.5 w-3.5" />
                    </button>

                </div>

            </div>


            {{-- Timeline --}}
            <div class="relative mt-8">

                {{-- line --}}
                <div class="absolute bottom-5 left-[19px] top-5 hidden w-px bg-[#DFECEF] sm:block"></div>


                {{-- Session --}}
                <div class="relative flex gap-4 border-b border-[#EDF2F3] pb-7">

                    <div
                        class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-4 border-white bg-[#E4F4F7] text-[#63A1B3] shadow-sm">
                        <x-tabler-video class="h-4 w-4" />
                    </div>


                    <div class="min-w-0 flex-1">

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">

                            <div>

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="text-xs font-semibold text-[#587580]">
                                        Individual therapy
                                    </h3>

                                    <span
                                        class="rounded-full bg-[#EDF7F1] px-2 py-1 text-[8px] font-bold text-[#6F9882]">
                                        Completed
                                    </span>

                                </div>

                                <p class="mt-1 text-[10px] text-[#96A7AD]">
                                    Dr. Amelia Morgan · Sep 28, 2026 · 4:30 PM
                                </p>

                            </div>


                            <button class="inline-flex items-center gap-1.5 text-[9px] font-semibold text-[#6197A7]">
                                View session
                                <x-tabler-arrow-right class="h-3 w-3" />
                            </button>

                        </div>


                        <div class="mt-5 grid gap-3 sm:grid-cols-2">

                            <div class="rounded-2xl bg-[#F8FBFC] p-4">

                                <div class="flex items-center gap-2">

                                    <x-tabler-target class="h-3.5 w-3.5 text-[#79A6B2]" />

                                    <span class="text-[9px] font-bold uppercase tracking-[0.1em] text-[#8EA5AC]">
                                        Session focus
                                    </span>

                                </div>

                                <p class="mt-2 text-[11px] font-medium text-[#637F89]">
                                    Creating healthier boundaries
                                </p>

                            </div>


                            <div class="rounded-2xl bg-[#F8FBFC] p-4">

                                <div class="flex items-center gap-2">

                                    <x-tabler-sparkles class="h-3.5 w-3.5 text-[#79A6B2]" />

                                    <span class="text-[9px] font-bold uppercase tracking-[0.1em] text-[#8EA5AC]">
                                        Your takeaway
                                    </span>

                                </div>

                                <p class="mt-2 text-[11px] font-medium text-[#637F89]">
                                    “Notice before you respond.”
                                </p>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- Session --}}
                <div class="relative flex gap-4 border-b border-[#EDF2F3] py-7">

                    <div
                        class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-4 border-white bg-[#EAF6F8] text-[#63A1B3] shadow-sm">
                        <x-tabler-video class="h-4 w-4" />
                    </div>


                    <div class="min-w-0 flex-1">

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">

                            <div>

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="text-xs font-semibold text-[#587580]">
                                        Individual therapy
                                    </h3>

                                    <span
                                        class="rounded-full bg-[#EDF7F1] px-2 py-1 text-[8px] font-bold text-[#6F9882]">
                                        Completed
                                    </span>

                                </div>

                                <p class="mt-1 text-[10px] text-[#96A7AD]">
                                    Dr. Amelia Morgan · Sep 21, 2026 · 4:30 PM
                                </p>

                            </div>


                            <button class="inline-flex items-center gap-1.5 text-[9px] font-semibold text-[#6197A7]">
                                View session
                                <x-tabler-arrow-right class="h-3 w-3" />
                            </button>

                        </div>


                        <div class="mt-5 rounded-2xl border border-[#E5EFF1] bg-[#FAFCFD] p-4">

                            <div class="flex gap-3">

                                <div
                                    class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-white text-[#7BA5B0]">
                                    <x-tabler-notes class="h-4 w-4" />
                                </div>

                                <div>

                                    <div class="text-[9px] font-bold uppercase tracking-[0.1em] text-[#8EA5AC]">
                                        Session note
                                    </div>

                                    <p class="mt-2 text-[11px] leading-5 text-[#708993]">
                                        We explored the connection between feeling
                                        overwhelmed and taking on too much responsibility.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- Session --}}
                <div class="relative flex gap-4 pt-7">

                    <div
                        class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full border-4 border-white bg-[#F2EEF8] text-[#8A77A0] shadow-sm">
                        <x-tabler-video class="h-4 w-4" />
                    </div>


                    <div class="min-w-0 flex-1">

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">

                            <div>

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="text-xs font-semibold text-[#587580]">
                                        Individual therapy
                                    </h3>

                                    <span
                                        class="rounded-full bg-[#EDF7F1] px-2 py-1 text-[8px] font-bold text-[#6F9882]">
                                        Completed
                                    </span>

                                </div>

                                <p class="mt-1 text-[10px] text-[#96A7AD]">
                                    Dr. Amelia Morgan · Sep 14, 2026 · 4:30 PM
                                </p>

                            </div>


                            <button class="inline-flex items-center gap-1.5 text-[9px] font-semibold text-[#6197A7]">
                                View session
                                <x-tabler-arrow-right class="h-3 w-3" />
                            </button>

                        </div>


                        <div class="mt-5 flex flex-wrap gap-2">

                            <span class="rounded-full bg-[#F6F9FA] px-3 py-2 text-[9px] text-[#7C949D]">
                                Self-trust
                            </span>

                            <span class="rounded-full bg-[#F6F9FA] px-3 py-2 text-[9px] text-[#7C949D]">
                                Reflection
                            </span>

                            <span class="rounded-full bg-[#F6F9FA] px-3 py-2 text-[9px] text-[#7C949D]">
                                Coping strategies
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <button
                class="mt-8 flex w-full items-center justify-center gap-2 rounded-xl border border-[#DCECEF] bg-[#FAFCFD] py-3 text-[10px] font-semibold text-[#698792] transition hover:bg-white">
                Load older sessions
                <x-tabler-chevron-down class="h-3.5 w-3.5" />
            </button>

        </section>



        {{-- =====================================================
        UPCOMING APPOINTMENTS
        ====================================================== --}}

        <section class="mt-5">

            <div class="mb-4 flex items-end justify-between">

                <div>

                    <h2 class="text-sm font-semibold text-[#4E6E79]">
                        Coming up
                    </h2>

                    <p class="mt-1 text-[10px] text-[#99AAB0]">
                        Your next few appointments
                    </p>

                </div>

                <button class="text-[10px] font-semibold text-[#5D98A9]">
                    View calendar
                </button>

            </div>


            <div class="grid gap-3 md:grid-cols-3">


                {{-- Appointment --}}
                <div class="rounded-[22px] border border-[#DCECEF] bg-white p-5">

                    <div class="flex items-center justify-between">

                        <span
                            class="rounded-full bg-[#EAF6F8] px-2.5 py-1 text-[8px] font-bold uppercase tracking-wider text-[#6097A7]">
                            In 3 days
                        </span>

                        <x-tabler-video class="h-4 w-4 text-[#7BA5B0]" />

                    </div>

                    <div class="mt-5 text-lg font-semibold text-[#577682]">
                        Individual therapy
                    </div>

                    <p class="mt-1 text-[10px] text-[#94A5AB]">
                        Dr. Amelia Morgan
                    </p>

                    <div class="mt-5 flex items-center gap-2 text-[10px] text-[#738B94]">
                        <x-tabler-clock class="h-3.5 w-3.5" />
                        Oct 4 · 4:30 PM
                    </div>

                </div>


                {{-- Appointment --}}
                <div class="rounded-[22px] border border-[#DCECEF] bg-white p-5">

                    <div class="flex items-center justify-between">

                        <span
                            class="rounded-full bg-[#F0F7F4] px-2.5 py-1 text-[8px] font-bold uppercase tracking-wider text-[#719988]">
                            Oct 11
                        </span>

                        <x-tabler-video class="h-4 w-4 text-[#7BA5B0]" />

                    </div>

                    <div class="mt-5 text-lg font-semibold text-[#577682]">
                        Individual therapy
                    </div>

                    <p class="mt-1 text-[10px] text-[#94A5AB]">
                        Dr. Amelia Morgan
                    </p>

                    <div class="mt-5 flex items-center gap-2 text-[10px] text-[#738B94]">
                        <x-tabler-clock class="h-3.5 w-3.5" />
                        Oct 11 · 4:30 PM
                    </div>

                </div>


                {{-- Appointment --}}
                <div class="rounded-[22px] border border-[#DCECEF] bg-white p-5">

                    <div class="flex items-center justify-between">

                        <span
                            class="rounded-full bg-[#F5F0F8] px-2.5 py-1 text-[8px] font-bold uppercase tracking-wider text-[#8A779A]">
                            Oct 18
                        </span>

                        <x-tabler-video class="h-4 w-4 text-[#7BA5B0]" />

                    </div>

                    <div class="mt-5 text-lg font-semibold text-[#577682]">
                        Individual therapy
                    </div>

                    <p class="mt-1 text-[10px] text-[#94A5AB]">
                        Dr. Amelia Morgan
                    </p>

                    <div class="mt-5 flex items-center gap-2 text-[10px] text-[#738B94]">
                        <x-tabler-clock class="h-3.5 w-3.5" />
                        Oct 18 · 4:30 PM
                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
        SESSION PREP
        ====================================================== --}}

        <section class="mt-5 overflow-hidden rounded-[26px] border border-[#DCECEF] bg-[#EAF6F8]">

            <div class="flex flex-col gap-6 p-6 sm:p-8 md:flex-row md:items-center md:justify-between">

                <div class="flex gap-4">

                    <div
                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white text-[#63A1B3]">
                        <x-tabler-sparkles class="h-5 w-5" />
                    </div>

                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#77A1AA]">
                            Before your next session
                        </div>

                        <h3 class="mt-2 text-sm font-semibold text-[#527580]">
                            Take a quick moment to check in.
                        </h3>

                        <p class="mt-1 max-w-2xl text-xs leading-5 text-[#78959E]">
                            Your recent check-ins can help you notice what has
                            been happening between sessions.
                        </p>

                    </div>

                </div>


                <a href="/check-in"
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-[10px] font-semibold text-[#5C91A0] shadow-sm transition hover:bg-[#FBFEFF]">
                    Do a check-in
                    <x-tabler-arrow-right class="h-3.5 w-3.5" />
                </a>

            </div>

        </section>


        <div class="h-10"></div>

    </main>

</div>