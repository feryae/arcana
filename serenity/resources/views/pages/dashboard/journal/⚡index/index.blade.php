{{-- resources/views/livewire/wellness/journal.blade.php --}}

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
                        <span>Journal</span>
                    </div>

                    <h1 class="text-3xl font-semibold tracking-[-0.045em] text-[#294A5B] sm:text-4xl">
                        Your journal
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-[#8198A2]">
                        A quiet place to put your thoughts into words,
                        without needing to make them perfect.
                    </p>

                </div>


                <div class="flex items-center gap-2">

                    <div
                        class="hidden items-center gap-2 rounded-full border border-[#DCECEF] bg-white px-3 py-2 sm:flex">

                        <x-tabler-lock class="h-3.5 w-3.5 text-[#82A4AE]" />

                        <span class="text-[9px] font-medium text-[#8099A2]">
                            Private journal
                        </span>

                    </div>

                    <button
                        class="inline-flex items-center gap-2 rounded-xl bg-[#5AA7C2] px-4 py-2.5 text-[10px] font-semibold text-white shadow-[0_8px_24px_rgba(90,167,194,.14)] transition hover:bg-[#4D99B4]">
                        <x-tabler-plus class="h-4 w-4" />
                        New entry
                    </button>

                </div>

            </div>

        </div>

    </header>



    {{-- =========================================================
    MAIN
    ========================================================== --}}

    <main class="mx-auto max-w-7xl px-5 py-7 sm:px-8 lg:px-10">

        <div class="grid gap-5 lg:grid-cols-[minmax(0,1fr)_330px]">


            {{-- =================================================
            LEFT / JOURNAL SPACE
            ================================================== --}}

            <section class="min-w-0">


                {{-- New entry card --}}
                <div
                    class="relative overflow-hidden rounded-[30px] border border-[#D5E9ED] bg-white shadow-[0_12px_40px_rgba(56,102,116,.045)]">

                    {{-- Ambient decoration --}}
                    <div class="absolute -right-20 -top-24 h-64 w-64 rounded-full bg-[#E6F6F8] blur-3xl"></div>

                    <div class="relative p-6 sm:p-8 lg:p-9">

                        {{-- Entry metadata --}}
                        <div class="flex flex-wrap items-center justify-between gap-3">

                            <div class="flex items-center gap-2">

                                <span
                                    class="rounded-full bg-[#EAF6F8] px-3 py-1.5 text-[8px] font-bold uppercase tracking-[0.16em] text-[#6798A7]">
                                    Today
                                </span>

                                <span class="text-[9px] text-[#A0AFB4]">
                                    Wednesday, October 1
                                </span>

                            </div>


                            <button
                                class="flex h-8 w-8 items-center justify-center rounded-lg text-[#9BAEB4] transition hover:bg-[#F4F9FA] hover:text-[#638F9D]">
                                <x-tabler-dots class="h-4 w-4" />
                            </button>

                        </div>


                        {{-- Mood --}}
                        <div class="mt-7">

                            <div class="text-[9px] font-bold uppercase tracking-[0.16em] text-[#95A9AF]">
                                How are you arriving today?
                            </div>


                            <div class="mt-3 flex flex-wrap gap-2">

                                @foreach ([
                                        ['icon' => 'mood-smile', 'label' => 'Good'],
                                        ['icon' => 'mood-neutral', 'label' => 'Okay'],
                                        ['icon' => 'mood-sad', 'label' => 'Low'],
                                        ['icon' => 'mood-confuzed', 'label' => 'Unsettled'],
                                    ] as $mood)

                                    <button
                                        class="inline-flex items-center gap-2 rounded-xl border border-[#DFECEF] bg-[#FAFCFD] px-3 py-2 text-[9px] font-medium text-[#829AA2] transition hover:border-[#C4E0E6] hover:bg-[#F3FAFB]">
                                        @if ($mood['icon'] === 'mood-smile')
                                            <x-tabler-mood-smile class="h-4 w-4" />
                                        @elseif ($mood['icon'] === 'mood-neutral')
                                            <x-tabler-mood-neutral class="h-4 w-4" />
                                        @elseif ($mood['icon'] === 'mood-sad')
                                            <x-tabler-mood-sad class="h-4 w-4" />
                                        @else
                                            <x-tabler-mood-confuzed class="h-4 w-4" />
                                        @endif

                                        {{ $mood['label'] }}
                                    </button>

                                @endforeach

                            </div>

                        </div>


                        {{-- Writing area --}}
                        <div class="mt-8">

                            <input type="text" placeholder="Give this moment a title..."
                                class="w-full border-0 bg-transparent p-0 text-2xl font-semibold tracking-[-0.035em] text-[#3F626E] outline-none placeholder:text-[#C2CDD0]" />


                            <textarea rows="12" placeholder="What's on your mind?

You don't need to know where this is going. Start wherever feels natural..."
                                class="mt-5 w-full resize-none border-0 bg-transparent p-0 text-sm leading-7 text-[#627D87] outline-none placeholder:text-[#B0BDC1]"></textarea>

                        </div>


                        {{-- Writing toolbar --}}
                        <div class="mt-3 border-t border-[#E8EFF1] pt-4">

                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                                <div class="flex items-center gap-1">

                                    <button
                                        class="flex h-8 w-8 items-center justify-center rounded-lg text-[#9BAEB3] transition hover:bg-[#F4F9FA] hover:text-[#648F9C]"
                                        title="Add mood">
                                        <x-tabler-mood-smile class="h-4 w-4" />
                                    </button>

                                    <button
                                        class="flex h-8 w-8 items-center justify-center rounded-lg text-[#9BAEB3] transition hover:bg-[#F4F9FA] hover:text-[#648F9C]"
                                        title="Add image">
                                        <x-tabler-photo class="h-4 w-4" />
                                    </button>

                                    <button
                                        class="flex h-8 w-8 items-center justify-center rounded-lg text-[#9BAEB3] transition hover:bg-[#F4F9FA] hover:text-[#648F9C]"
                                        title="Add tag">
                                        <x-tabler-tag class="h-4 w-4" />
                                    </button>

                                </div>


                                <div class="flex items-center gap-3">

                                    <span class="text-[8px] text-[#A6B3B7]">
                                        Saved automatically
                                    </span>

                                    <button
                                        class="inline-flex items-center gap-2 rounded-xl bg-[#5AA7C2] px-4 py-2.5 text-[9px] font-semibold text-white transition hover:bg-[#4D99B4]">
                                        Save entry
                                        <x-tabler-check class="h-3.5 w-3.5" />
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                RECENT ENTRIES
                ================================================== --}}

                <section class="mt-8">

                    <div class="flex items-end justify-between">

                        <div>

                            <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#92A6AD]">
                                Looking back
                            </div>

                            <h2 class="mt-2 text-xl font-semibold tracking-[-0.035em] text-[#4D6E79]">
                                Recent entries
                            </h2>

                        </div>


                        <button class="hidden items-center gap-1.5 text-[9px] font-semibold text-[#6796A4] sm:flex">
                            View journal
                            <x-tabler-arrow-right class="h-3.5 w-3.5" />
                        </button>

                    </div>


                    <div class="mt-4 space-y-3">


                        {{-- Entry --}}
                        <article
                            class="group rounded-[24px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(67,116,130,.055)]">

                            <div class="flex gap-4">

                                <div
                                    class="flex h-11 w-11 shrink-0 flex-col items-center justify-center rounded-[14px] bg-[#EAF6F8]">

                                    <span class="text-[7px] font-bold uppercase tracking-wider text-[#7FA0A8]">
                                        Sep
                                    </span>

                                    <span class="mt-0.5 text-sm font-semibold text-[#5E8996]">
                                        30
                                    </span>

                                </div>


                                <div class="min-w-0 flex-1">

                                    <div class="flex items-start justify-between gap-4">

                                        <div>

                                            <h3 class="text-xs font-semibold text-[#587580]">
                                                A slower morning than usual
                                            </h3>

                                            <div class="mt-1 flex items-center gap-2">

                                                <span class="text-[8px] text-[#A0AEB2]">
                                                    8:24 AM
                                                </span>

                                                <span class="h-1 w-1 rounded-full bg-[#C7D3D6]"></span>

                                                <span class="inline-flex items-center gap-1 text-[8px] text-[#87A1A8]">
                                                    <x-tabler-mood-smile class="h-3 w-3" />
                                                    Good
                                                </span>

                                            </div>

                                        </div>


                                        <button
                                            class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-[#A2B0B4] opacity-0 transition group-hover:opacity-100">
                                            <x-tabler-dots class="h-4 w-4" />
                                        </button>

                                    </div>


                                    <p class="mt-3 line-clamp-2 text-[10px] leading-5 text-[#91A4AA]">
                                        I didn't rush into checking everything this
                                        morning. I sat by the window for a few minutes
                                        and noticed how different the day felt...
                                    </p>


                                    <div class="mt-3 flex items-center gap-1.5">

                                        <span
                                            class="rounded-full bg-[#F3F8F9] px-2 py-1 text-[7px] font-medium text-[#8CA2A8]">
                                            morning
                                        </span>

                                        <span
                                            class="rounded-full bg-[#F3F8F9] px-2 py-1 text-[7px] font-medium text-[#8CA2A8]">
                                            mindfulness
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </article>



                        {{-- Entry --}}
                        <article
                            class="group rounded-[24px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(67,116,130,.055)]">

                            <div class="flex gap-4">

                                <div
                                    class="flex h-11 w-11 shrink-0 flex-col items-center justify-center rounded-[14px] bg-[#F0F7F4]">

                                    <span class="text-[7px] font-bold uppercase tracking-wider text-[#8BA99A]">
                                        Sep
                                    </span>

                                    <span class="mt-0.5 text-sm font-semibold text-[#709686]">
                                        28
                                    </span>

                                </div>


                                <div class="min-w-0 flex-1">

                                    <div class="flex items-start justify-between gap-4">

                                        <div>

                                            <h3 class="text-xs font-semibold text-[#587580]">
                                                Something I'm learning
                                            </h3>

                                            <div class="mt-1 flex items-center gap-2">

                                                <span class="text-[8px] text-[#A0AEB2]">
                                                    9:17 PM
                                                </span>

                                                <span class="h-1 w-1 rounded-full bg-[#C7D3D6]"></span>

                                                <span class="inline-flex items-center gap-1 text-[8px] text-[#87A1A8]">
                                                    <x-tabler-mood-neutral class="h-3 w-3" />
                                                    Reflective
                                                </span>

                                            </div>

                                        </div>


                                        <button
                                            class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-[#A2B0B4] opacity-0 transition group-hover:opacity-100">
                                            <x-tabler-dots class="h-4 w-4" />
                                        </button>

                                    </div>


                                    <p class="mt-3 line-clamp-2 text-[10px] leading-5 text-[#91A4AA]">
                                        Maybe I don't need to solve every uncomfortable
                                        feeling. Sometimes noticing it seems to be enough...
                                    </p>


                                    <div class="mt-3 flex items-center gap-1.5">

                                        <span
                                            class="rounded-full bg-[#F3F8F9] px-2 py-1 text-[7px] font-medium text-[#8CA2A8]">
                                            reflection
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </article>



                        {{-- Entry --}}
                        <article
                            class="group rounded-[24px] border border-[#DCECEF] bg-white p-5 transition hover:-translate-y-0.5 hover:shadow-[0_10px_30px_rgba(67,116,130,.055)]">

                            <div class="flex gap-4">

                                <div
                                    class="flex h-11 w-11 shrink-0 flex-col items-center justify-center rounded-[14px] bg-[#F3EFF8]">

                                    <span class="text-[7px] font-bold uppercase tracking-wider text-[#9B8DA9]">
                                        Sep
                                    </span>

                                    <span class="mt-0.5 text-sm font-semibold text-[#897A9A]">
                                        25
                                    </span>

                                </div>


                                <div class="min-w-0 flex-1">

                                    <div class="flex items-start justify-between gap-4">

                                        <div>

                                            <h3 class="text-xs font-semibold text-[#587580]">
                                                Before my session
                                            </h3>

                                            <div class="mt-1 flex items-center gap-2">

                                                <span class="text-[8px] text-[#A0AEB2]">
                                                    6:42 PM
                                                </span>

                                                <span class="h-1 w-1 rounded-full bg-[#C7D3D6]"></span>

                                                <span class="inline-flex items-center gap-1 text-[8px] text-[#87A1A8]">
                                                    <x-tabler-mood-sad class="h-3 w-3" />
                                                    Low
                                                </span>

                                            </div>

                                        </div>


                                        <button
                                            class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg text-[#A2B0B4] opacity-0 transition group-hover:opacity-100">
                                            <x-tabler-dots class="h-4 w-4" />
                                        </button>

                                    </div>


                                    <p class="mt-3 line-clamp-2 text-[10px] leading-5 text-[#91A4AA]">
                                        There are a few things I want to remember
                                        to bring up during tomorrow's session...
                                    </p>


                                    <div class="mt-3 flex items-center gap-1.5">

                                        <span
                                            class="rounded-full bg-[#F3F8F9] px-2 py-1 text-[7px] font-medium text-[#8CA2A8]">
                                            therapy
                                        </span>

                                        <span
                                            class="rounded-full bg-[#F3F8F9] px-2 py-1 text-[7px] font-medium text-[#8CA2A8]">
                                            thoughts
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </article>

                    </div>


                    <button
                        class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl border border-dashed border-[#D3E5E9] py-3 text-[9px] font-semibold text-[#7196A0] transition hover:border-[#BCD9E0] hover:bg-white">
                        View all entries
                        <x-tabler-arrow-down class="h-3.5 w-3.5" />
                    </button>

                </section>

            </section>



            {{-- =================================================
            RIGHT SIDEBAR
            ================================================== --}}

            <aside class="space-y-4">


                {{-- Journal prompt --}}
                <section class="relative overflow-hidden rounded-[26px] border border-[#D6E9ED] bg-[#EAF6F8] p-6">

                    <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-white/40 blur-2xl"></div>

                    <div class="relative">

                        <div class="flex items-center justify-between">

                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-white text-[#67A0AE]">
                                <x-tabler-sparkles class="h-4 w-4" />
                            </div>

                            <span class="text-[8px] font-bold uppercase tracking-[0.16em] text-[#83A2AA]">
                                Daily prompt
                            </span>

                        </div>


                        <h3 class="mt-6 text-base font-semibold leading-6 tracking-[-0.02em] text-[#4F747F]">
                            What felt a little easier today?
                        </h3>

                        <p class="mt-2 text-[10px] leading-5 text-[#78959E]">
                            It doesn't have to be something big.
                            Look for the small moments.
                        </p>


                        <button
                            class="mt-5 inline-flex items-center gap-2 rounded-xl bg-white px-4 py-2.5 text-[9px] font-semibold text-[#6494A2] shadow-sm">
                            Use this prompt
                            <x-tabler-arrow-right class="h-3.5 w-3.5" />
                        </button>

                    </div>

                </section>



                {{-- Journal stats --}}
                <section class="rounded-[26px] border border-[#DCECEF] bg-white p-6">

                    <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#95A8AE]">
                        Your journal
                    </div>


                    <div class="mt-5 grid grid-cols-2 gap-3">

                        <div class="rounded-2xl bg-[#F7FAFB] p-4">

                            <div class="text-2xl font-semibold tracking-[-0.05em] text-[#587B86]">
                                28
                            </div>

                            <div class="mt-1 text-[8px] text-[#97A8AE]">
                                entries
                            </div>

                        </div>


                        <div class="rounded-2xl bg-[#F7FAFB] p-4">

                            <div class="text-2xl font-semibold tracking-[-0.05em] text-[#587B86]">
                                9
                            </div>

                            <div class="mt-1 text-[8px] text-[#97A8AE]">
                                this month
                            </div>

                        </div>

                    </div>


                    <div class="mt-3 rounded-2xl bg-[#F7FAFB] p-4">

                        <div class="flex items-center justify-between">

                            <span class="text-[9px] font-medium text-[#8299A0]">
                                Writing rhythm
                            </span>

                            <span class="text-[9px] font-semibold text-[#6B9AA7]">
                                4 days
                            </span>

                        </div>


                        <div class="mt-3 flex gap-1.5">

                            @foreach (range(1, 7) as $day)

                                <div
                                    class="h-1.5 flex-1 rounded-full {{ in_array($day, [4, 5, 6, 7]) ? 'bg-[#78B2C0]' : 'bg-[#E3ECEE]' }}">
                                </div>

                            @endforeach

                        </div>

                    </div>

                </section>



                {{-- Mood patterns --}}
                <section class="rounded-[26px] border border-[#DCECEF] bg-white p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#95A8AE]">
                                Mood notes
                            </div>

                            <p class="mt-1 text-[9px] text-[#A0AEB2]">
                                From your journal entries
                            </p>

                        </div>

                        <x-tabler-chart-dots class="h-4 w-4 text-[#A0B0B5]" />

                    </div>


                    <div class="mt-5 flex items-end gap-1.5">

                        @foreach ([35, 48, 42, 68, 54, 76, 64, 82, 70, 88, 73, 91] as $height)

                            <div class="flex-1 rounded-t-md bg-[#D9EDF1]" style="height: {{ $height / 2.2 }}px"></div>

                        @endforeach

                    </div>


                    <div class="mt-3 flex justify-between text-[7px] text-[#A3B0B4]">

                        <span>Sep 20</span>
                        <span>Today</span>

                    </div>


                    <p class="mt-4 text-[9px] leading-4 text-[#92A5AA]">
                        Your recent entries show more moments of
                        <span class="font-semibold text-[#6C9099]">calm</span>
                        than earlier this month.
                    </p>

                </section>



                {{-- Prompt collection --}}
                <section class="rounded-[26px] border border-[#DCECEF] bg-white p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <div class="text-[9px] font-bold uppercase tracking-[0.18em] text-[#95A8AE]">
                                Prompt library
                            </div>

                            <p class="mt-1 text-[9px] text-[#A0AEB2]">
                                When you don't know where to begin
                            </p>

                        </div>

                        <x-tabler-books class="h-4 w-4 text-[#A0B0B5]" />

                    </div>


                    <div class="mt-4 space-y-1">

                        @foreach ([
                                ['label' => 'Self-compassion', 'icon' => 'heart'],
                                ['label' => 'Gratitude', 'icon' => 'sparkles'],
                                ['label' => 'Reflection', 'icon' => 'mirror'],
                                ['label' => 'Relationships', 'icon' => 'users'],
                            ] as $prompt)

                            <button
                                class="flex w-full items-center justify-between rounded-xl px-3 py-2.5 text-left transition hover:bg-[#F6FAFB]">

                                <div class="flex items-center gap-2.5">

                                    <span class="text-[#81A2AA]">

                                        @if ($prompt['icon'] === 'heart')
                                            <x-tabler-heart class="h-3.5 w-3.5" />
                                        @elseif ($prompt['icon'] === 'sparkles')
                                            <x-tabler-sparkles class="h-3.5 w-3.5" />
                                        @elseif ($prompt['icon'] === 'mirror')
                                            <x-tabler-window class="h-3.5 w-3.5" />
                                        @else
                                            <x-tabler-users class="h-3.5 w-3.5" />
                                        @endif

                                    </span>

                                    <span class="text-[9px] font-medium text-[#7E969E]">
                                        {{ $prompt['label'] }}
                                    </span>

                                </div>

                                <x-tabler-chevron-right class="h-3 w-3 text-[#B2BEC2]" />

                            </button>

                        @endforeach

                    </div>

                </section>



                {{-- Privacy --}}
                <div class="flex items-start gap-2.5 px-2 py-2">

                    <x-tabler-shield-lock class="mt-0.5 h-3.5 w-3.5 shrink-0 text-[#9CAEB3]" />

                    <p class="text-[8px] leading-4 text-[#9BA9AE]">
                        Your journal is personal to you. Entries are private
                        and aren't shared with your therapist unless you
                        choose to share something.
                    </p>

                </div>

            </aside>

        </div>


        <div class="h-8"></div>

    </main>

</div>