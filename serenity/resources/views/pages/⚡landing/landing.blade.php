<div>

    {{-- =========================================================
    HERO
    ========================================================== --}}

    <main>

        <section class="relative overflow-hidden">

            {{-- Background atmosphere --}}
            <div class="absolute inset-0">

                <div
                    class="absolute -right-40 -top-40 h-[600px] w-[600px] rounded-full bg-[#D9F2FA] opacity-70 blur-3xl">
                </div>

                <div
                    class="absolute -left-40 top-[420px] h-[500px] w-[500px] rounded-full bg-[#E8F6F8] opacity-80 blur-3xl">
                </div>

                <div class="absolute left-[45%] top-[20%] h-32 w-32 rounded-full bg-white opacity-80 blur-3xl">
                </div>

            </div>


            <div class="relative mx-auto max-w-7xl px-6 pb-20 pt-36 lg:px-8 lg:pb-28 lg:pt-44">

                <div class="grid items-center gap-16 lg:grid-cols-[1.05fr_0.95fr]">


                    {{-- Hero copy --}}
                    <div class="max-w-2xl">




                        <h1
                            class="text-5xl font-semibold leading-[1.03] tracking-[-0.04em] text-[#19334A] sm:text-6xl lg:text-[76px]">

                            A quiet place

                            <span class="relative whitespace-nowrap text-[#5BA9C3]">
                                to become
                                <svg class="absolute -bottom-3 left-0 w-full" viewBox="0 0 300 12" fill="none">

                                    <path d="M3 8C80 2 205 2 297 7" stroke="#9DD8E7" stroke-width="3"
                                        stroke-linecap="round" />

                                </svg>
                            </span>

                            yourself.

                        </h1>


                        <p class="mt-8 max-w-xl text-lg leading-8 text-[#668294]">
                            Serenity brings therapy, reflection, and everyday wellness
                            together in one peaceful space — helping you understand
                            yourself, heal gently, and grow at your own pace.
                        </p>


                        <div class="mt-9 flex flex-col gap-3 sm:flex-row">

                            <a href="/register"
                                class="group inline-flex items-center justify-center gap-3 rounded-2xl bg-[#5AA7C2] px-6 py-4 text-sm font-semibold text-white shadow-[0_15px_35px_rgba(90,167,194,0.25)] transition hover:-translate-y-1 hover:bg-[#4B98B4]">

                                Start your journey

                                <span
                                    class="flex h-7 w-7 items-center justify-center rounded-full bg-white/15 transition group-hover:translate-x-0.5">

                                    <x-tabler-arrow-right class="h-4 w-4" />

                                </span>

                            </a>


                            <a href="#how-it-works"
                                class="inline-flex items-center justify-center gap-2 rounded-2xl border border-[#D4E7ED] bg-white/70 px-6 py-4 text-sm font-semibold text-[#52758A] backdrop-blur transition hover:border-[#B8DCE7] hover:bg-white">

                                <x-tabler-player-play class="h-4 w-4" />

                                Discover Serenity

                            </a>

                        </div>


                        {{-- Trust --}}
                        <div class="mt-10 flex items-center gap-4">

                            <div class="flex -space-x-2">

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-white bg-[#D8EFF5] text-xs font-semibold text-[#4C91AA]">
                                    AM
                                </div>

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-white bg-[#E8E7F7] text-xs font-semibold text-[#7273A7]">
                                    JL
                                </div>

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-white bg-[#DFF1E9] text-xs font-semibold text-[#609477]">
                                    SK
                                </div>

                                <div
                                    class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-white bg-[#F5EBD9] text-xs font-semibold text-[#A68A5D]">
                                    +
                                </div>

                            </div>

                            <div>
                                <div class="flex items-center gap-1 text-[#E3AA55]">
                                    @for ($i = 0; $i < 5; $i++)
                                        <x-tabler-star-filled class="h-3.5 w-3.5" />
                                    @endfor
                                </div>

                                <p class="mt-0.5 text-xs text-[#78909E]">
                                    Loved by people finding their balance
                                </p>
                            </div>

                        </div>

                    </div>



                    {{-- =================================================
                    HERO SANCTUARY CARD
                    ================================================== --}}

                    <div class="relative mx-auto w-full max-w-[540px]">

                        {{-- floating moon --}}
                        <div
                            class="absolute -right-2 top-8 z-20 flex h-20 w-20 items-center justify-center rounded-full border border-white/70 bg-white/70 shadow-xl shadow-[#8BC8DA]/20 backdrop-blur-xl lg:-right-8">

                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full bg-[#DDF2F8] text-[#5EA6BF]">
                                <x-tabler-moon class="h-6 w-6" />
                            </div>

                        </div>


                        {{-- Main card --}}
                        <div
                            class="relative overflow-hidden rounded-[40px] border border-white/80 bg-white/65 p-4 shadow-[0_35px_90px_rgba(67,128,151,0.15)] backdrop-blur-xl">

                            <div
                                class="relative min-h-[560px] overflow-hidden rounded-[30px] bg-gradient-to-b from-[#DDF3F8] via-[#EAF7F8] to-[#F6FBFA]">


                                {{-- Decorative sky --}}
                                <div class="absolute inset-0">

                                    <div
                                        class="absolute right-16 top-12 h-2 w-2 rounded-full bg-white shadow-[0_0_15px_white]">
                                    </div>

                                    <div
                                        class="absolute left-16 top-28 h-1.5 w-1.5 rounded-full bg-white shadow-[0_0_12px_white]">
                                    </div>

                                    <div
                                        class="absolute right-32 top-44 h-1.5 w-1.5 rounded-full bg-white shadow-[0_0_12px_white]">
                                    </div>

                                </div>


                                {{-- Moon --}}
                                <div
                                    class="absolute left-1/2 top-14 h-36 w-36 -translate-x-1/2 rounded-full bg-white/80 shadow-[0_0_70px_rgba(255,255,255,0.8)]">

                                    <div class="absolute right-7 top-7 h-4 w-4 rounded-full bg-[#E6F3F5]">
                                    </div>

                                    <div class="absolute left-9 top-16 h-3 w-3 rounded-full bg-[#E6F3F5]">
                                    </div>

                                </div>


                                {{-- Mountains --}}
                                <div class="absolute bottom-0 left-0 right-0">

                                    <svg viewBox="0 0 600 330" class="w-full">

                                        <path d="M0 330V240L105 155L180 225L290 95L390 205L470 135L600 250V330H0Z"
                                            fill="#C8E6EB" />

                                        <path d="M0 330V275L125 205L215 260L315 160L420 260L510 190L600 260V330H0Z"
                                            fill="#B4DCE3" />

                                        <path d="M0 330V300L100 255L175 285L275 215L370 290L465 235L600 300V330H0Z"
                                            fill="#9FCFD9" />

                                    </svg>

                                </div>


                                {{-- Wellness quote --}}
                                <div
                                    class="absolute bottom-8 left-6 right-6 rounded-[25px] border border-white/70 bg-white/70 p-5 shadow-lg backdrop-blur-xl">

                                    <div class="mb-3 flex items-center justify-between">

                                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#6C9EAD]">
                                            Today's reflection
                                        </span>

                                        <x-tabler-sparkles class="h-4 w-4 text-[#71B4C8]" />

                                    </div>

                                    <p class="text-lg font-medium leading-7 text-[#294A5B]">
                                        “You don't have to have everything figured out
                                        to take the next gentle step.”
                                    </p>

                                    <div class="mt-4 flex items-center gap-2">

                                        <div class="h-1.5 w-1.5 rounded-full bg-[#70B8CC]"></div>

                                        <span class="text-xs text-[#7897A2]">
                                            A moment for you
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- Floating session card --}}
                        <div
                            class="absolute -bottom-7 -left-6 hidden w-64 rounded-2xl border border-white/80 bg-white/85 p-4 shadow-[0_20px_50px_rgba(57,110,130,0.15)] backdrop-blur-xl sm:block">

                            <div class="flex items-center gap-3">

                                <div
                                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E1F3F7] text-[#559BB4]">
                                    <x-tabler-heart-handshake class="h-5 w-5" />
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-[#294A5B]">
                                        Your care team
                                    </p>

                                    <p class="text-xs text-[#7897A2]">
                                        Always within reach
                                    </p>
                                </div>

                            </div>

                            <div class="mt-4 flex items-center justify-between">

                                <div class="flex -space-x-1.5">

                                    <span class="h-6 w-6 rounded-full border-2 border-white bg-[#CFE8EF]"></span>

                                    <span class="h-6 w-6 rounded-full border-2 border-white bg-[#E4DFF0]"></span>

                                    <span class="h-6 w-6 rounded-full border-2 border-white bg-[#DDEEDC]"></span>

                                </div>

                                <span class="text-xs font-semibold text-[#5D8D9E]">
                                    Explore →
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
        PHILOSOPHY
        ========================================================== --}}

        <section id="how-it-works" class="border-y border-[#E0EEF2] bg-white/60">

            <div class="mx-auto max-w-7xl px-6 py-24 lg:px-8">

                <div class="mx-auto max-w-2xl text-center">

                    <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#6BA6B8]">
                        A different approach
                    </span>

                    <h2 class="mt-4 text-4xl font-semibold tracking-[-0.03em] text-[#19334A] sm:text-5xl">
                        Care for the whole you.
                    </h2>

                    <p class="mt-5 text-base leading-7 text-[#718A97]">
                        Serenity brings professional support and everyday
                        self-care together, because healing doesn't only
                        happen inside a therapy session.
                    </p>

                </div>


                <div class="mt-16 grid gap-5 md:grid-cols-3">

                    {{-- Card --}}
                    <div
                        class="group rounded-[28px] border border-[#DCECF1] bg-[#F7FCFD] p-7 transition hover:-translate-y-1 hover:bg-white hover:shadow-xl hover:shadow-[#83C3D6]/10">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#DDF2F7] text-[#5A9FB6]">
                            <x-tabler-heart class="h-6 w-6" />
                        </div>

                        <h3 class="mt-7 text-xl font-semibold text-[#294A5B]">
                            Understand
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-[#78909E]">
                            Discover patterns, emotions, and the little things
                            that shape how you feel.
                        </p>

                    </div>


                    <div
                        class="group rounded-[28px] border border-[#DCECF1] bg-[#F7FCFD] p-7 transition hover:-translate-y-1 hover:bg-white hover:shadow-xl hover:shadow-[#83C3D6]/10">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#E8EAF8] text-[#777BAE]">
                            <x-tabler-users class="h-6 w-6" />
                        </div>

                        <h3 class="mt-7 text-xl font-semibold text-[#294A5B]">
                            Connect
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-[#78909E]">
                            Meet compassionate professionals who can walk
                            beside you through the difficult chapters.
                        </p>

                    </div>


                    <div
                        class="group rounded-[28px] border border-[#DCECF1] bg-[#F7FCFD] p-7 transition hover:-translate-y-1 hover:bg-white hover:shadow-xl hover:shadow-[#83C3D6]/10">

                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#E2F2E9] text-[#67987A]">
                            <x-tabler-sparkles class="h-6 w-6" />
                        </div>

                        <h3 class="mt-7 text-xl font-semibold text-[#294A5B]">
                            Grow
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-[#78909E]">
                            Build small rituals and healthier habits that
                            continue long after your sessions end.
                        </p>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
        THERAPIST + WELLNESS SPLIT
        ========================================================== --}}

        <section id="therapists" class="relative overflow-hidden">

            <div class="mx-auto max-w-7xl px-6 py-28 lg:px-8">

                <div class="grid items-center gap-20 lg:grid-cols-2">

                    <div>

                        <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#6BA6B8]">
                            Human connection
                        </span>

                        <h2
                            class="mt-4 max-w-lg text-4xl font-semibold leading-tight tracking-[-0.03em] text-[#19334A] sm:text-5xl">
                            Your healing journey was never meant to be walked alone.
                        </h2>

                        <p class="mt-6 max-w-lg leading-7 text-[#718A97]">
                            Find therapists based on your needs, preferences,
                            and the kind of support you're looking for.
                            Serenity makes the first step feel a little less daunting.
                        </p>


                        <div class="mt-8 space-y-4">

                            @foreach ([
                                    ['icon' => 'shield-check', 'title' => 'Thoughtful matching', 'text' => 'Discover professionals aligned with your needs.'],
                                    ['icon' => 'message-circle', 'title' => 'A private space', 'text' => 'Keep your conversations and reflections somewhere safe.'],
                                    ['icon' => 'calendar-heart', 'title' => 'Care that fits life', 'text' => 'Manage sessions and wellness around your rhythm.'],
                                ] as $item)

                                <div class="flex gap-4">

                                    <div
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#E3F3F7] text-[#5A9FB6]">

                                        @if ($item['icon'] === 'shield-check')
                                            <x-tabler-shield-check class="h-5 w-5" />
                                        @elseif ($item['icon'] === 'message-circle')
                                            <x-tabler-message-circle class="h-5 w-5" />
                                        @else
                                            <x-tabler-calendar-heart class="h-5 w-5" />
                                        @endif

                                    </div>

                                    <div>
                                        <h3 class="text-sm font-semibold text-[#294A5B]">
                                            {{ $item['title'] }}
                                        </h3>

                                        <p class="mt-1 text-sm leading-6 text-[#78909E]">
                                            {{ $item['text'] }}
                                        </p>
                                    </div>

                                </div>

                            @endforeach

                        </div>


                        <a href="/therapists"
                            class="mt-9 inline-flex items-center gap-2 text-sm font-semibold text-[#4E94AA] transition hover:gap-3">

                            Explore therapists

                            <x-tabler-arrow-right class="h-4 w-4" />

                        </a>

                    </div>


                    {{-- Therapist visual --}}
                    <div class="relative">

                        <div class="absolute -inset-10 rounded-full bg-[#DDF3F8] opacity-60 blur-3xl">
                        </div>

                        <div
                            class="relative rounded-[35px] border border-white bg-white/75 p-5 shadow-[0_30px_80px_rgba(70,130,150,0.12)] backdrop-blur">

                            <div class="rounded-[26px] bg-[#F4FAFB] p-5">

                                <div class="flex items-center justify-between">

                                    <div>
                                        <p class="text-xs font-medium text-[#8BA1AA]">
                                            Suggested for you
                                        </p>

                                        <h3 class="mt-1 text-lg font-semibold text-[#294A5B]">
                                            Gentle support
                                        </h3>
                                    </div>

                                    <button
                                        class="flex h-9 w-9 items-center justify-center rounded-xl bg-white text-[#679BAD] shadow-sm">
                                        <x-tabler-adjustments-horizontal class="h-4 w-4" />
                                    </button>

                                </div>


                                <div class="mt-5 space-y-3">

                                    @foreach ([
                                            ['name' => 'Elena Rivers', 'specialty' => 'Anxiety & self-esteem', 'initials' => 'ER', 'color' => 'bg-[#DDEFF4]'],
                                            ['name' => 'Rowan Vale', 'specialty' => 'Life transitions', 'initials' => 'RV', 'color' => 'bg-[#E7E4F4]'],
                                            ['name' => 'Mira Sol', 'specialty' => 'Mindfulness & burnout', 'initials' => 'MS', 'color' => 'bg-[#E1F0E5]'],
                                        ] as $therapist)

                                        <div
                                            class="flex items-center gap-4 rounded-2xl border border-[#E2EEF1] bg-white p-4">

                                            <div
                                                class="flex h-12 w-12 items-center justify-center rounded-full {{ $therapist['color'] }} text-xs font-bold text-[#638A98]">
                                                {{ $therapist['initials'] }}
                                            </div>

                                            <div class="min-w-0 flex-1">

                                                <div class="flex items-center gap-2">

                                                    <h4 class="text-sm font-semibold text-[#294A5B]">
                                                        {{ $therapist['name'] }}
                                                    </h4>

                                                    <span class="h-1.5 w-1.5 rounded-full bg-[#77BE9A]">
                                                    </span>

                                                </div>

                                                <p class="mt-1 text-xs text-[#8A9CA5]">
                                                    {{ $therapist['specialty'] }}
                                                </p>

                                            </div>

                                            <button
                                                class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#F1F8FA] text-[#6599AA]">
                                                <x-tabler-chevron-right class="h-4 w-4" />
                                            </button>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
        WELLNESS SECTION
        ========================================================== --}}

        <section id="wellness" class="bg-[#EAF6F8]">

            <div class="mx-auto max-w-7xl px-6 py-28 lg:px-8">

                <div class="grid items-center gap-16 lg:grid-cols-[0.8fr_1.2fr]">

                    <div>

                        <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#5C9CAF]">
                            Everyday wellness
                        </span>

                        <h2 class="mt-4 text-4xl font-semibold tracking-[-0.03em] text-[#19334A] sm:text-5xl">
                            Small rituals.
                            <span class="text-[#5AA7C2]">Meaningful change.</span>
                        </h2>

                        <p class="mt-6 max-w-md leading-7 text-[#718A97]">
                            Your mental wellbeing is built in the moments between
                            appointments. Fill those moments with things that
                            help you breathe, reflect, and reconnect.
                        </p>

                    </div>


                    <div class="grid gap-4 sm:grid-cols-2">

                        @foreach ([
                                ['icon' => 'wind', 'title' => 'Breathing', 'text' => 'Slow down and return to the present.'],
                                ['icon' => 'book-2', 'title' => 'Journaling', 'text' => 'Give your thoughts somewhere to land.'],
                                ['icon' => 'moon-stars', 'title' => 'Sleep rituals', 'text' => 'Create peaceful evenings and gentler nights.'],
                                ['icon' => 'leaf', 'title' => 'Mindful moments', 'text' => 'Reconnect with yourself throughout the day.'],
                            ] as $item)

                            <div
                                class="rounded-[25px] border border-white/80 bg-white/75 p-6 shadow-sm transition hover:-translate-y-1 hover:bg-white hover:shadow-lg">

                                <div
                                    class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#DDF1F5] text-[#5B9EB4]">

                                    @if ($item['icon'] === 'wind')
                                        <x-tabler-wind class="h-5 w-5" />
                                    @elseif ($item['icon'] === 'book-2')
                                        <x-tabler-book-2 class="h-5 w-5" />
                                    @elseif ($item['icon'] === 'moon-stars')
                                        <x-tabler-moon-stars class="h-5 w-5" />
                                    @else
                                        <x-tabler-leaf class="h-5 w-5" />
                                    @endif

                                </div>

                                <h3 class="mt-5 font-semibold text-[#294A5B]">
                                    {{ $item['title'] }}
                                </h3>

                                <p class="mt-2 text-sm leading-6 text-[#78909E]">
                                    {{ $item['text'] }}
                                </p>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
        TESTIMONIAL
        ========================================================== --}}

        <section id="stories" class="bg-white">

            <div class="mx-auto max-w-5xl px-6 py-28 text-center lg:px-8">

                <div
                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#E4F4F7] text-[#63A5B8]">
                    <x-tabler-quote class="h-6 w-6" />
                </div>

                <blockquote
                    class="mt-8 text-3xl font-medium leading-tight tracking-[-0.025em] text-[#294A5B] sm:text-4xl">

                    “Serenity doesn't make me feel like something is wrong
                    with me. It reminds me that I'm allowed to take care of myself.”

                </blockquote>

                <div class="mt-8">

                    <div class="text-sm font-semibold text-[#52788A]">
                        A Serenity member
                    </div>

                    <div class="mt-1 text-xs text-[#93A5AD]">
                        Shared anonymously
                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
        CTA
        ========================================================== --}}

        <section class="relative overflow-hidden bg-[#CFEAF2]">

            <div class="absolute inset-0">

                <div class="absolute -left-20 -top-32 h-96 w-96 rounded-full bg-white/30 blur-3xl">
                </div>

                <div class="absolute -bottom-40 -right-20 h-[500px] w-[500px] rounded-full bg-[#9FD4E2]/40 blur-3xl">
                </div>

            </div>


            <div class="relative mx-auto max-w-5xl px-6 py-24 text-center lg:px-8">

                <div
                    class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-white/70 text-[#559EB6] shadow-sm">
                    <x-tabler-sparkles class="h-7 w-7" />
                </div>

                <h2 class="mt-7 text-4xl font-semibold tracking-[-0.03em] text-[#19334A] sm:text-5xl">
                    You deserve a softer place to land.
                </h2>

                <p class="mx-auto mt-5 max-w-xl leading-7 text-[#5F8492]">
                    Start with one small step. Serenity will be here for the rest
                    of the journey.
                </p>

                <div class="mt-8">

                    <a href="/register"
                        class="inline-flex items-center gap-3 rounded-2xl bg-[#4F9DB8] px-7 py-4 text-sm font-semibold text-white shadow-[0_15px_35px_rgba(59,125,149,0.2)] transition hover:-translate-y-1 hover:bg-[#438DA8]">

                        Begin your journey

                        <x-tabler-arrow-right class="h-4 w-4" />

                    </a>

                </div>

            </div>

        </section>

    </main>



    {{-- =========================================================
    FOOTER
    ========================================================== --}}

    <footer class="bg-[#173346] text-white">

        <div class="mx-auto max-w-7xl px-6 py-14 lg:px-8">

            <div class="grid gap-12 lg:grid-cols-[1.5fr_1fr_1fr_1fr]">

                <div>

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-[#9DD8E7]">
                            <x-tabler-moon-stars class="h-5 w-5" />
                        </div>

                        <span class="text-lg font-semibold">
                            Serenity
                        </span>

                    </div>

                    <p class="mt-5 max-w-xs text-sm leading-6 text-[#91AAB6]">
                        A peaceful space for therapy, reflection,
                        and everyday wellbeing.
                    </p>

                </div>


                <div>

                    <h3 class="text-sm font-semibold">
                        Platform
                    </h3>

                    <div class="mt-5 space-y-3 text-sm text-[#91AAB6]">

                        <a href="#how-it-works" class="block hover:text-white">
                            How it works
                        </a>

                        <a href="#wellness" class="block hover:text-white">
                            Wellness
                        </a>

                        <a href="#therapists" class="block hover:text-white">
                            Therapists
                        </a>

                    </div>

                </div>


                <div>

                    <h3 class="text-sm font-semibold">
                        Resources
                    </h3>

                    <div class="mt-5 space-y-3 text-sm text-[#91AAB6]">

                        <a href="#" class="block hover:text-white">
                            Wellness library
                        </a>

                        <a href="#" class="block hover:text-white">
                            Journal
                        </a>

                        <a href="#" class="block hover:text-white">
                            Help center
                        </a>

                    </div>

                </div>


                <div>

                    <h3 class="text-sm font-semibold">
                        Serenity
                    </h3>

                    <div class="mt-5 space-y-3 text-sm text-[#91AAB6]">

                        <a href="#" class="block hover:text-white">
                            About
                        </a>

                        <a href="#" class="block hover:text-white">
                            Privacy
                        </a>

                        <a href="#" class="block hover:text-white">
                            Terms
                        </a>

                    </div>

                </div>

            </div>


            <div
                class="mt-14 flex flex-col gap-4 border-t border-white/10 pt-7 text-xs text-[#718D99] sm:flex-row sm:items-center sm:justify-between">

                <p>
                    © {{ date('Y') }} Serenity. Made for gentler days.
                </p>

                <div class="flex items-center gap-4">

                    <span class="flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#74C49B]"></span>
                        Your wellbeing matters
                    </span>

                </div>

            </div>

        </div>

    </footer>

</div>