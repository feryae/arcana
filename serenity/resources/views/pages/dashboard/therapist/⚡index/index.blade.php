{{-- resources/views/livewire/therapist.blade.php --}}

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
                        <span>My therapist</span>
                    </div>

                    <h1 class="text-3xl font-semibold tracking-[-0.04em] text-[#294A5B] sm:text-4xl">
                        Your care space
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-[#8198A2]">
                        A private space for your sessions, conversations,
                        resources, and the person supporting your journey.
                    </p>

                </div>


                <button
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#5AA7C2] px-5 py-3 text-xs font-semibold text-white shadow-[0_8px_24px_rgba(90,167,194,.16)] transition hover:-translate-y-0.5 hover:bg-[#4D99B4]">
                    <x-tabler-calendar-plus class="h-4 w-4" />
                    Book a session
                </button>

            </div>

        </div>

    </header>



    {{-- =========================================================
    CONTENT
    ========================================================== --}}

    <main class="mx-auto max-w-7xl px-5 py-8 sm:px-8 lg:px-10">

        <div class="grid gap-5 lg:grid-cols-[1.25fr_.75fr]">


            {{-- =================================================
            THERAPIST HERO
            ================================================== --}}

            <section class="relative overflow-hidden rounded-[30px] border border-[#D8EAEE] bg-white">

                <div class="absolute -right-20 -top-24 h-64 w-64 rounded-full bg-[#E7F6F8] blur-3xl"></div>
                <div class="absolute -bottom-28 left-1/3 h-56 w-56 rounded-full bg-[#F0F7F5] blur-3xl"></div>


                <div class="relative p-7 sm:p-9">

                    <div class="flex flex-col gap-7 sm:flex-row sm:items-start">

                        {{-- Avatar --}}
                        <div class="relative shrink-0">

                            <div
                                class="flex h-28 w-28 items-center justify-center overflow-hidden rounded-[30px] bg-[#DCEFF3] text-[#5B99AB] shadow-sm">

                                {{-- Replace with therapist image --}}
                                <span class="text-3xl font-semibold">
                                    AM
                                </span>

                            </div>

                            <div
                                class="absolute -bottom-2 -right-2 flex h-8 w-8 items-center justify-center rounded-full border-4 border-white bg-[#74B899] text-white">
                                <x-tabler-check class="h-3.5 w-3.5" />
                            </div>

                        </div>


                        {{-- Info --}}
                        <div class="min-w-0 flex-1">

                            <div class="flex flex-wrap items-center gap-2">

                                <span
                                    class="rounded-full bg-[#EAF6F8] px-2.5 py-1 text-[9px] font-bold uppercase tracking-[0.12em] text-[#6098A8]">
                                    Your therapist
                                </span>

                                <span class="flex items-center gap-1.5 text-[9px] font-medium text-[#7D999F]">
                                    <span class="h-1.5 w-1.5 rounded-full bg-[#73B596]"></span>
                                    Available
                                </span>

                            </div>


                            <h2 class="mt-4 text-2xl font-semibold tracking-[-0.035em] text-[#294A5B]">
                                Dr. Amelia Morgan
                            </h2>

                            <p class="mt-1 text-xs text-[#8198A2]">
                                Clinical Psychologist · 8 years experience
                            </p>


                            <div class="mt-5 flex flex-wrap gap-2">

                                <span
                                    class="rounded-full border border-[#DDEBED] bg-[#F9FCFD] px-3 py-1.5 text-[9px] font-medium text-[#6D8993]">
                                    Anxiety & stress
                                </span>

                                <span
                                    class="rounded-full border border-[#DDEBED] bg-[#F9FCFD] px-3 py-1.5 text-[9px] font-medium text-[#6D8993]">
                                    Self-esteem
                                </span>

                                <span
                                    class="rounded-full border border-[#DDEBED] bg-[#F9FCFD] px-3 py-1.5 text-[9px] font-medium text-[#6D8993]">
                                    Life transitions
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Relationship message --}}
                    <div class="mt-8 rounded-[22px] bg-[#F4FAFB] p-5">

                        <div class="flex gap-3">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-[#68A5B6]">
                                <x-tabler-heart-handshake class="h-4 w-4" />
                            </div>

                            <div>

                                <div class="text-[9px] font-bold uppercase tracking-[0.16em] text-[#88A4AC]">
                                    Your care relationship
                                </div>

                                <p class="mt-2 max-w-2xl text-xs leading-5 text-[#66818C]">
                                    You've been working together for
                                    <strong class="font-semibold text-[#527581]">3 months</strong>.
                                    Your next session is coming up in three days.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="mt-6 flex flex-col gap-2 sm:flex-row">

                        <button
                            class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl bg-[#5AA7C2] px-4 py-3 text-xs font-semibold text-white transition hover:bg-[#4C98B3]">
                            <x-tabler-video class="h-4 w-4" />
                            Join session
                        </button>

                        <button
                            class="inline-flex flex-1 items-center justify-center gap-2 rounded-xl border border-[#DCECEF] bg-white px-4 py-3 text-xs font-semibold text-[#63808A] transition hover:border-[#C6E0E6] hover:bg-[#F9FCFD]">
                            <x-tabler-message-circle class="h-4 w-4" />
                            Message
                        </button>

                    </div>

                </div>

            </section>



            {{-- =================================================
            NEXT SESSION
            ================================================== --}}

            <section class="rounded-[30px] border border-[#D8EAEE] bg-[#E9F6F8] p-7 sm:p-8">

                <div class="flex items-center justify-between">

                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#76A0AA]">
                            Next session
                        </div>

                        <div class="mt-2 text-lg font-semibold text-[#4D7180]">
                            Thursday
                        </div>

                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white text-[#62A0B1]">
                        <x-tabler-calendar-heart class="h-5 w-5" />
                    </div>

                </div>


                <div class="mt-8">

                    <div class="text-4xl font-semibold tracking-[-0.05em] text-[#416977]">
                        4:30
                        <span class="text-base font-medium text-[#71929C]">
                            PM
                        </span>
                    </div>

                    <p class="mt-2 text-xs text-[#7997A0]">
                        50 minute video session
                    </p>

                </div>


                <div class="mt-7 flex items-center gap-3 rounded-2xl bg-white/70 p-3">

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#DDF0F4] text-[#65A1B2]">
                        <x-tabler-video class="h-4 w-4" />
                    </div>

                    <div>

                        <div class="text-[10px] font-semibold text-[#5B7A85]">
                            Online session
                        </div>

                        <div class="mt-0.5 text-[9px] text-[#91A5AB]">
                            Your secure session room
                        </div>

                    </div>

                </div>


                <button
                    class="mt-5 flex w-full items-center justify-center gap-2 rounded-xl bg-white px-4 py-3 text-[10px] font-semibold text-[#5D8E9C] transition hover:bg-[#F9FEFF]">
                    View appointment
                    <x-tabler-arrow-right class="h-3.5 w-3.5" />
                </button>

            </section>

        </div>



        {{-- =====================================================
        QUICK ACTIONS
        ====================================================== --}}

        <div class="mt-5 grid gap-3 sm:grid-cols-3">

            <a href="/messages"
                class="group rounded-[22px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:border-[#C8E2E8]">

                <div class="flex items-center justify-between">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#EAF6F8] text-[#64A2B4]">
                        <x-tabler-message-circle class="h-5 w-5" />
                    </div>

                    <x-tabler-arrow-up-right
                        class="h-4 w-4 text-[#A7B6BB] transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[#5E9AAC]" />

                </div>

                <h3 class="mt-5 text-sm font-semibold text-[#54727D]">
                    Messages
                </h3>

                <p class="mt-1 text-[10px] leading-5 text-[#94A5AB]">
                    Continue your conversation between sessions.
                </p>

                <div class="mt-4 inline-flex items-center gap-1.5 text-[9px] font-semibold text-[#5C98AA]">
                    2 unread messages
                    <span class="h-1.5 w-1.5 rounded-full bg-[#67AFC1]"></span>
                </div>

            </a>


            <a href="/appointments"
                class="group rounded-[22px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:border-[#C8E2E8]">

                <div class="flex items-center justify-between">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F0F7F4] text-[#6D9B87]">
                        <x-tabler-calendar-event class="h-5 w-5" />
                    </div>

                    <x-tabler-arrow-up-right
                        class="h-4 w-4 text-[#A7B6BB] transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[#5E9AAC]" />

                </div>

                <h3 class="mt-5 text-sm font-semibold text-[#54727D]">
                    Appointments
                </h3>

                <p class="mt-1 text-[10px] leading-5 text-[#94A5AB]">
                    See upcoming and previous care sessions.
                </p>

                <div class="mt-4 text-[9px] font-semibold text-[#699181]">
                    4 upcoming sessions
                </div>

            </a>


            <a href="/resources"
                class="group rounded-[22px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:border-[#C8E2E8]">

                <div class="flex items-center justify-between">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F4F0F8] text-[#8B76A0]">
                        <x-tabler-books class="h-5 w-5" />
                    </div>

                    <x-tabler-arrow-up-right
                        class="h-4 w-4 text-[#A7B6BB] transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[#5E9AAC]" />

                </div>

                <h3 class="mt-5 text-sm font-semibold text-[#54727D]">
                    Care resources
                </h3>

                <p class="mt-1 text-[10px] leading-5 text-[#94A5AB]">
                    Exercises and resources shared by your therapist.
                </p>

                <div class="mt-4 text-[9px] font-semibold text-[#8A779B]">
                    5 resources available
                </div>

            </a>

        </div>



        {{-- =====================================================
        CARE OVERVIEW
        ====================================================== --}}

        <div class="mt-5 grid gap-5 lg:grid-cols-[1.15fr_.85fr]">


            {{-- =================================================
            CARE PLAN
            ================================================== --}}

            <section class="rounded-[26px] border border-[#DCECEF] bg-white p-6 sm:p-7">

                <div class="flex items-start justify-between">

                    <div>

                        <div class="flex items-center gap-2">

                            <div
                                class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#EAF6F8] text-[#65A1B2]">
                                <x-tabler-notes class="h-4 w-4" />
                            </div>

                            <h2 class="text-sm font-semibold text-[#4E6E79]">
                                Your care focus
                            </h2>

                        </div>

                        <p class="mt-2 text-[10px] text-[#99AAB0]">
                            Areas you're exploring together
                        </p>

                    </div>


                    <button class="rounded-lg p-2 text-[#91A6AE] hover:bg-[#F5FAFB]">
                        <x-tabler-dots class="h-4 w-4" />
                    </button>

                </div>


                <div class="mt-7 space-y-4">

                    @foreach ([
                            ['title' => 'Managing everyday stress', 'progress' => 72, 'icon' => 'wind'],
                            ['title' => 'Creating healthier boundaries', 'progress' => 48, 'icon' => 'shield-heart'],
                            ['title' => 'Building self-trust', 'progress' => 35, 'icon' => 'sparkles'],
                        ] as $focus)

                        <div class="rounded-2xl border border-[#E6EFF1] bg-[#FAFCFD] p-4">

                            <div class="flex items-center justify-between gap-4">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-white text-[#73A4B0]">

                                        @if ($focus['icon'] === 'wind')
                                            <x-tabler-wind class="h-4 w-4" />
                                        @elseif ($focus['icon'] === 'shield-heart')
                                            <x-tabler-shield-heart class="h-4 w-4" />
                                        @else
                                            <x-tabler-sparkles class="h-4 w-4" />
                                        @endif

                                    </div>

                                    <span class="text-xs font-medium text-[#617E88]">
                                        {{ $focus['title'] }}
                                    </span>

                                </div>

                                <span class="text-[10px] font-semibold text-[#75949E]">
                                    {{ $focus['progress'] }}%
                                </span>

                            </div>


                            <div class="mt-4 h-1.5 overflow-hidden rounded-full bg-[#E9F1F3]">

                                <div class="h-full rounded-full bg-[#83BAC6]" style="width: {{ $focus['progress'] }}%">
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </section>



            {{-- =================================================
            SHARED NOTE
            ================================================== --}}

            <section class="rounded-[26px] border border-[#DCECEF] bg-[#F8FCFC] p-6 sm:p-7">

                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white text-[#68A3B3]">
                        <x-tabler-notebook class="h-4 w-4" />
                    </div>

                    <div>

                        <div class="text-[9px] font-bold uppercase tracking-[0.16em] text-[#8CA5AC]">
                            Shared note
                        </div>

                        <div class="mt-0.5 text-xs font-semibold text-[#5D7A84]">
                            From your last session
                        </div>

                    </div>

                </div>


                <blockquote class="mt-7">

                    <p class="text-sm leading-7 text-[#68838C]">
                        “Try noticing the moment when you begin
                        to put pressure on yourself. You don't need
                        to fix it immediately — just notice it.”
                    </p>

                </blockquote>


                <div class="mt-6 flex items-center justify-between border-t border-[#E2ECEE] pt-5">

                    <span class="text-[9px] text-[#9BAAAF]">
                        Sep 28 · Dr. Morgan
                    </span>

                    <button class="text-[9px] font-semibold text-[#5E96A6]">
                        View session note
                    </button>

                </div>

            </section>

        </div>



        {{-- =====================================================
        RECENT SESSIONS
        ====================================================== --}}

        <section class="mt-5 rounded-[26px] border border-[#DCECEF] bg-white p-6 sm:p-7">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-sm font-semibold text-[#4E6E79]">
                        Recent sessions
                    </h2>

                    <p class="mt-1 text-[10px] text-[#99AAB0]">
                        Your care history
                    </p>

                </div>

                <a href="/appointments" class="text-[10px] font-semibold text-[#5C98A9] hover:text-[#437F91]">
                    View all
                </a>

            </div>


            <div class="mt-6 overflow-x-auto">

                <div class="min-w-[650px]">

                    <div
                        class="grid grid-cols-[1.2fr_1fr_1fr_.6fr] border-b border-[#EDF2F3] px-4 pb-3 text-[9px] font-bold uppercase tracking-[0.12em] text-[#A0AFB4]">
                        <span>Session</span>
                        <span>Focus</span>
                        <span>Date</span>
                        <span>Status</span>
                    </div>


                    @foreach ([
                            ['session' => 'Individual therapy', 'focus' => 'Boundaries', 'date' => 'Sep 28, 2026', 'status' => 'Completed'],
                            ['session' => 'Individual therapy', 'focus' => 'Stress & rest', 'date' => 'Sep 21, 2026', 'status' => 'Completed'],
                            ['session' => 'Individual therapy', 'focus' => 'Self-trust', 'date' => 'Sep 14, 2026', 'status' => 'Completed'],
                        ] as $session)

                        <div
                            class="grid grid-cols-[1.2fr_1fr_1fr_.6fr] items-center border-b border-[#F0F4F5] px-4 py-4 last:border-0">

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#EAF6F8] text-[#69A3B3]">
                                    <x-tabler-video class="h-4 w-4" />
                                </div>

                                <span class="text-xs font-medium text-[#607C87]">
                                    {{ $session['session'] }}
                                </span>

                            </div>

                            <span class="text-[10px] text-[#8B9EA4]">
                                {{ $session['focus'] }}
                            </span>

                            <span class="text-[10px] text-[#8B9EA4]">
                                {{ $session['date'] }}
                            </span>

                            <span
                                class="inline-flex w-fit rounded-full bg-[#EDF7F1] px-2.5 py-1 text-[9px] font-semibold text-[#6E9982]">
                                {{ $session['status'] }}
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </section>



        {{-- =====================================================
        FOOTER NOTE
        ====================================================== --}}

        <div class="mt-5 rounded-2xl border border-[#DCECEF] bg-white/60 px-5 py-4">

            <div class="flex items-start gap-3">

                <x-tabler-lock class="mt-0.5 h-4 w-4 shrink-0 text-[#88A5AE]" />

                <p class="text-[10px] leading-5 text-[#8A9EA5]">
                    Your care space is private. Information shared here is only
                    accessible to you and the care professionals you choose to work with.
                </p>

            </div>

        </div>


        <div class="h-10"></div>

    </main>

</div>