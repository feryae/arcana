{{-- dashboard/index.blade.php --}}

<div class="min-h-screen bg-[#F4FAFC] text-[#294A5B]">


    {{-- =========================================================
    CONTENT
    ========================================================== --}}

    <main class="mx-auto max-w-[1500px] px-5 py-8 sm:px-8 lg:py-10">


        {{-- =====================================================
        WELCOME
        ====================================================== --}}

        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

            <div>

                <div class="flex items-center gap-2 text-xs font-medium text-[#8AA2AC]">
                    <span>Thursday</span>
                    <span class="h-1 w-1 rounded-full bg-[#B5CBD3]"></span>
                    <span>October 1, 2026</span>
                </div>

                <h1 class="mt-2 text-3xl font-semibold tracking-[-0.035em] text-[#294A5B] sm:text-4xl">
                    Good afternoon, Ari.
                </h1>

                <p class="mt-2 text-sm text-[#7B929D]">
                    There's no rush. Let's see how you're feeling today.
                </p>

            </div>


            <a href="/check-in"
                class="group inline-flex items-center gap-3 self-start rounded-2xl bg-[#5AA7C2] px-5 py-3.5 text-sm font-semibold text-white shadow-[0_12px_30px_rgba(90,167,194,0.18)] transition hover:-translate-y-0.5 hover:bg-[#4B98B4] lg:self-auto">

                <x-tabler-sparkles class="h-4 w-4" />

                Daily check-in

                <x-tabler-arrow-up-right
                    class="h-4 w-4 transition group-hover:translate-x-0.5 group-hover:-translate-y-0.5" />

            </a>

        </div>



        {{-- =====================================================
        MAIN GRID
        ====================================================== --}}

        <div class="mt-8 grid gap-5 xl:grid-cols-[1.45fr_0.8fr]">


            {{-- =================================================
            MOOD / SANCTUARY CARD
            ================================================== --}}

            <section
                class="relative overflow-hidden rounded-[30px] border border-white bg-white shadow-[0_20px_60px_rgba(61,126,148,0.08)]">

                {{-- Atmosphere --}}
                <div class="absolute inset-0">

                    <div class="absolute -right-24 -top-28 h-80 w-80 rounded-full bg-[#DDF3F8] blur-3xl">
                    </div>

                    <div class="absolute bottom-[-160px] left-[-100px] h-80 w-80 rounded-full bg-[#EAF7F5] blur-3xl">
                    </div>

                </div>


                <div class="relative p-6 sm:p-8">

                    <div class="flex items-start justify-between">

                        <div>

                            <div class="flex items-center gap-2">

                                <span
                                    class="flex h-7 w-7 items-center justify-center rounded-lg bg-[#E3F3F7] text-[#5A9FB6]">
                                    <x-tabler-sun class="h-4 w-4" />
                                </span>

                                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#7B9CA8]">
                                    Your sanctuary
                                </span>

                            </div>

                            <h2 class="mt-4 text-2xl font-semibold tracking-tight text-[#294A5B]">
                                How are you feeling?
                            </h2>

                            <p class="mt-1 text-sm text-[#849AA4]">
                                Your recent check-ins show a little more calm this week.
                            </p>

                        </div>


                        <button
                            class="flex h-9 w-9 items-center justify-center rounded-xl text-[#9AAEB6] hover:bg-[#F3F8F9]">
                            <x-tabler-dots class="h-5 w-5" />
                        </button>

                    </div>


                    {{-- Mood visualization --}}
                    <div class="mt-8 grid items-center gap-8 md:grid-cols-[0.8fr_1fr]">

                        <div class="flex justify-center">

                            <div class="relative flex h-52 w-52 items-center justify-center">

                                {{-- rings --}}
                                <div class="absolute inset-0 rounded-full border border-[#D9EEF3]">
                                </div>

                                <div class="absolute inset-5 rounded-full border border-[#D9EEF3]/80">
                                </div>

                                <div class="absolute inset-10 rounded-full border border-[#D9EEF3]/70">
                                </div>


                                {{-- progress arc --}}
                                <svg class="absolute inset-0 h-full w-full -rotate-90" viewBox="0 0 200 200">

                                    <circle cx="100" cy="100" r="88" fill="none" stroke="#E7F3F6" stroke-width="5" />

                                    <circle cx="100" cy="100" r="88" fill="none" stroke="#69B2C8" stroke-width="5"
                                        stroke-linecap="round" stroke-dasharray="553" stroke-dashoffset="155" />

                                </svg>


                                <div class="relative text-center">

                                    <div class="text-5xl">
                                        ☁️
                                    </div>

                                    <div class="mt-2 text-xs font-semibold text-[#5A8391]">
                                        Mostly calm
                                    </div>

                                    <div class="mt-1 text-[10px] text-[#9AAEB6]">
                                        Today
                                    </div>

                                </div>

                            </div>

                        </div>


                        <div>

                            <div class="grid grid-cols-2 gap-3">

                                <div class="rounded-2xl bg-[#F5FAFB] p-4">

                                    <div class="flex items-center justify-between">

                                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#91A6AE]">
                                            Mood
                                        </span>

                                        <x-tabler-mood-smile class="h-4 w-4 text-[#69A9BB]" />

                                    </div>

                                    <div class="mt-3 text-xl font-semibold text-[#3D6070]">
                                        7.4
                                        <span class="text-xs font-normal text-[#9AAEB6]">/ 10</span>
                                    </div>

                                    <div class="mt-2 text-[10px] text-[#74A28D]">
                                        ↑ 12% this week
                                    </div>

                                </div>


                                <div class="rounded-2xl bg-[#F5FAFB] p-4">

                                    <div class="flex items-center justify-between">

                                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#91A6AE]">
                                            Energy
                                        </span>

                                        <x-tabler-battery-3 class="h-4 w-4 text-[#69A9BB]" />

                                    </div>

                                    <div class="mt-3 text-xl font-semibold text-[#3D6070]">
                                        6.8
                                        <span class="text-xs font-normal text-[#9AAEB6]">/ 10</span>
                                    </div>

                                    <div class="mt-2 text-[10px] text-[#9AAEB6]">
                                        About the same
                                    </div>

                                </div>

                            </div>


                            <div class="mt-4 rounded-2xl border border-[#DDECEF] bg-white/70 p-4">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#E7F4F6] text-[#5A9FB6]">
                                        <x-tabler-sparkles class="h-4 w-4" />
                                    </div>

                                    <div>

                                        <p class="text-xs font-semibold text-[#496A78]">
                                            A gentle observation
                                        </p>

                                        <p class="mt-1 text-xs leading-5 text-[#8A9EA6]">
                                            Your evenings seem to be your calmest time.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>



            {{-- =================================================
            NEXT SESSION
            ================================================== --}}

            <section
                class="relative overflow-hidden rounded-[30px] bg-[#24495B] p-6 text-white shadow-[0_20px_60px_rgba(36,73,91,0.15)]">

                <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-[#5DA8C1]/20 blur-3xl">
                </div>

                <div class="absolute bottom-0 left-0 h-40 w-40 rounded-full bg-[#8ACBD9]/10 blur-3xl">
                </div>


                <div class="relative">

                    <div class="flex items-center justify-between">

                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#A5CBD7]">
                            Next session
                        </span>

                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/10 text-[#B5DDE7]">
                            <x-tabler-calendar-heart class="h-4 w-4" />
                        </div>

                    </div>


                    <div class="mt-8">

                        <div class="text-3xl font-semibold">
                            Tomorrow
                        </div>

                        <div class="mt-1 text-sm text-[#A7C1CA]">
                            Friday · 4:30 PM
                        </div>

                    </div>


                    <div class="mt-8 flex items-center gap-3">

                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-full bg-[#D8EEF3] text-xs font-bold text-[#5B91A3]">
                            ER
                        </div>

                        <div>

                            <div class="text-sm font-semibold">
                                Elena Rivers
                            </div>

                            <div class="mt-0.5 text-xs text-[#A7C1CA]">
                                Your therapist
                            </div>

                        </div>

                    </div>


                    <div class="mt-8 rounded-2xl border border-white/10 bg-white/5 p-4">

                        <div class="flex items-center gap-3">

                            <x-tabler-video class="h-4 w-4 text-[#9CCCD8]" />

                            <span class="text-xs text-[#B5CDD4]">
                                Video session
                            </span>

                            <span class="ml-auto text-xs font-medium text-[#D2E6EA]">
                                50 min
                            </span>

                        </div>

                    </div>


                    <a href="#"
                        class="mt-4 flex items-center justify-center gap-2 rounded-xl bg-white px-4 py-3 text-xs font-semibold text-[#31586A] transition hover:bg-[#EFF9FB]">

                        View session

                        <x-tabler-arrow-up-right class="h-4 w-4" />

                    </a>

                </div>

            </section>

        </div>



        {{-- =====================================================
        LOWER GRID
        ====================================================== --}}

        <div class="mt-5 grid gap-5 lg:grid-cols-[1.1fr_0.9fr_0.8fr]">


            {{-- =================================================
            DAILY RITUAL
            ================================================== --}}

            <section class="rounded-[28px] border border-[#DCECEF] bg-white p-6">

                <div class="flex items-start justify-between">

                    <div>

                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#86A1AA]">
                            Today's ritual
                        </span>

                        <h2 class="mt-2 text-xl font-semibold text-[#345765]">
                            Make space to breathe.
                        </h2>

                    </div>

                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#E4F3F6] text-[#65A5B8]">
                        <x-tabler-wind class="h-4 w-4" />
                    </span>

                </div>


                <div class="mt-6 rounded-2xl bg-[#F3F9FA] p-5">

                    <div class="flex items-center gap-4">

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#DDEFF4] text-[#5EA4B9]">

                            <x-tabler-wind class="h-6 w-6" />

                        </div>

                        <div>

                            <div class="text-sm font-semibold text-[#486875]">
                                Ocean Breath
                            </div>

                            <div class="mt-1 text-xs text-[#91A3AA]">
                                A 5-minute breathing exercise
                            </div>

                        </div>

                    </div>


                    <div class="mt-5 flex items-center justify-between text-[10px] text-[#91A3AA]">

                        <span>
                            5 minutes
                        </span>

                        <span>
                            Beginner
                        </span>

                    </div>

                    <div class="mt-3 h-1 overflow-hidden rounded-full bg-[#DCECEF]">
                        <div class="h-full w-[35%] rounded-full bg-[#72B5C8]"></div>
                    </div>

                </div>


                <button
                    class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl border border-[#DCECEF] py-3 text-xs font-semibold text-[#628795] transition hover:bg-[#F5FAFB]">

                    Begin ritual

                    <x-tabler-arrow-right class="h-4 w-4" />

                </button>

            </section>



            {{-- =================================================
            JOURNAL
            ================================================== --}}

            <section class="rounded-[28px] border border-[#DCECEF] bg-white p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#86A1AA]">
                            Your journal
                        </span>

                        <h2 class="mt-2 text-xl font-semibold text-[#345765]">
                            Thoughts to keep.
                        </h2>

                    </div>

                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#F1F7F8] text-[#7195A1]">
                        <x-tabler-plus class="h-4 w-4" />
                    </a>

                </div>


                <div class="mt-6">

                    <div class="relative overflow-hidden rounded-2xl bg-[#F3F8F7] p-5">

                        <div class="absolute -right-8 -top-8 h-24 w-24 rounded-full bg-[#DDEEE8]">
                        </div>

                        <div class="relative">

                            <div class="flex items-center gap-2">

                                <x-tabler-feather class="h-4 w-4 text-[#78A691]" />

                                <span class="text-[10px] font-semibold text-[#78968A]">
                                    September 30
                                </span>

                            </div>

                            <p class="mt-4 text-sm leading-6 text-[#617A76]">
                                “I realized I don't need to solve everything
                                today. Some things can simply be...
                            </p>

                            <a href="#"
                                class="mt-4 inline-flex items-center gap-1 text-[11px] font-semibold text-[#6E9B86]">
                                Continue reading
                                <x-tabler-arrow-right class="h-3 w-3" />
                            </a>

                        </div>

                    </div>

                </div>


                <div class="mt-4 flex items-center justify-between">

                    <span class="text-[10px] text-[#A0AFB5]">
                        14 entries this month
                    </span>

                    <a href="#" class="text-[10px] font-semibold text-[#7198A4]">
                        View journal →
                    </a>

                </div>

            </section>



            {{-- =================================================
            WELLNESS STREAK
            ================================================== --}}

            <section class="rounded-[28px] border border-[#DCECEF] bg-white p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#86A1AA]">
                            Your rhythm
                        </span>

                        <h2 class="mt-2 text-xl font-semibold text-[#345765]">
                            12 days
                        </h2>

                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#FFF4DE] text-[#D6A254]">
                        <x-tabler-flame class="h-5 w-5" />
                    </div>

                </div>


                <p class="mt-3 text-xs leading-5 text-[#8A9EA6]">
                    You've checked in or completed a wellness ritual
                    for twelve days.
                </p>


                <div class="mt-6 grid grid-cols-7 gap-2">

                    @foreach (['M', 'T', 'W', 'T', 'F', 'S', 'S'] as $day)

                        <div class="text-center">

                            <div class="text-[9px] font-medium text-[#A0B0B6]">
                                {{ $day }}
                            </div>

                            <div
                                class="mx-auto mt-2 flex h-7 w-7 items-center justify-center rounded-full
                                            {{ $loop->index < 5 ? 'bg-[#DDF0F3] text-[#5799AE]' : 'bg-[#F1F6F7] text-[#A5B3B8]' }}">

                                @if ($loop->index < 5)
                                    <x-tabler-check class="h-3.5 w-3.5" />
                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>


                <div class="mt-6 rounded-xl bg-[#F7FAFA] p-3 text-center">

                    <p class="text-[10px] text-[#9AAAB0]">
                        Keep going gently.
                    </p>

                </div>

            </section>

        </div>



        {{-- =====================================================
        EXPLORE / QUICK ACTIONS
        ====================================================== --}}

        <section class="mt-8">

            <div class="flex items-end justify-between">

                <div>

                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#86A1AA]">
                        Explore your sanctuary
                    </span>

                    <h2 class="mt-2 text-xl font-semibold text-[#345765]">
                        Something for you
                    </h2>

                </div>

                <a href="#" class="hidden text-xs font-semibold text-[#6B96A4] sm:block">
                    View everything →
                </a>

            </div>


            <div class="mt-5 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

                @foreach ([
                        [
                            'icon' => 'book-2',
                            'title' => 'Wellness library',
                            'text' => 'Guides, reflections & gentle practices',
                            'bg' => 'bg-[#E5F3F6]',
                            'iconColor' => 'text-[#5B9EB3]',
                        ],
                        [
                            'icon' => 'headphones',
                            'title' => 'Guided audio',
                            'text' => 'Meditations for whatever today brings',
                            'bg' => 'bg-[#EAE8F6]',
                            'iconColor' => 'text-[#777BA9]',
                        ],
                        [
                            'icon' => 'message-heart',
                            'title' => 'Talk to your therapist',
                            'text' => 'Send a message or share an update',
                            'bg' => 'bg-[#E4F1E8]',
                            'iconColor' => 'text-[#65977A]',
                        ],
                        [
                            'icon' => 'mood-search',
                            'title' => 'Mood insights',
                            'text' => 'Understand patterns in your wellbeing',
                            'bg' => 'bg-[#FFF0DC]',
                            'iconColor' => 'text-[#C49154]',
                        ],
                    ] as $item)

                    <a href="#"
                        class="group rounded-[25px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-1 hover:border-[#C8E3EA] hover:shadow-[0_15px_40px_rgba(70,130,150,0.08)]">

                        <div class="flex items-start justify-between">

                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-xl {{ $item['bg'] }} {{ $item['iconColor'] }}">

                                @if ($item['icon'] === 'book-2')
                                    <x-tabler-book-2 class="h-5 w-5" />
                                @elseif ($item['icon'] === 'headphones')
                                    <x-tabler-headphones class="h-5 w-5" />
                                @elseif ($item['icon'] === 'message-heart')
                                    <x-tabler-message-heart class="h-5 w-5" />
                                @else
                                    <x-tabler-mood-search class="h-5 w-5" />
                                @endif

                            </div>

                            <x-tabler-arrow-up-right
                                class="h-4 w-4 text-[#A5B6BC] transition group-hover:-translate-y-0.5 group-hover:translate-x-0.5 group-hover:text-[#6597A6]" />

                        </div>

                        <h3 class="mt-5 text-sm font-semibold text-[#486875]">
                            {{ $item['title'] }}
                        </h3>

                        <p class="mt-1.5 text-xs leading-5 text-[#91A2A9]">
                            {{ $item['text'] }}
                        </p>

                    </a>

                @endforeach

            </div>

        </section>



        {{-- =====================================================
        GENTLE REMINDER
        ====================================================== --}}

        <div
            class="mt-8 flex flex-col gap-4 rounded-[25px] border border-[#DDECEF] bg-[#EAF6F8] p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">

            <div class="flex items-center gap-4">

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-white text-[#65A7B9] shadow-sm">
                    <x-tabler-cloud class="h-5 w-5" />
                </div>

                <div>

                    <p class="text-sm font-semibold text-[#4E7180]">
                        A little reminder
                    </p>

                    <p class="mt-1 text-xs text-[#839AA3]">
                        You don't need to be productive every moment to be making progress.
                    </p>

                </div>

            </div>

            <button
                class="self-start rounded-xl bg-white px-4 py-2.5 text-xs font-semibold text-[#668D9A] shadow-sm transition hover:bg-[#F9FFFF] sm:self-auto">
                Save this thought
            </button>

        </div>

    </main>

</div>