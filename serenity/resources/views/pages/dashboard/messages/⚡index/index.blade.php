{{-- resources/views/livewire/care/messages.blade.php --}}

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
                        <span>Care</span>
                        <x-tabler-chevron-right class="h-3 w-3" />
                        <span>Messages</span>
                    </div>

                    <h1 class="text-3xl font-semibold tracking-[-0.04em] text-[#294A5B] sm:text-4xl">
                        Messages
                    </h1>

                    <p class="mt-2 max-w-xl text-sm leading-6 text-[#8198A2]">
                        A private place to stay connected with your care team
                        between sessions.
                    </p>

                </div>


                <div class="flex items-center gap-2">

                    <div class="flex items-center gap-2 rounded-full border border-[#DCECEF] bg-white px-3 py-2">

                        <span class="h-1.5 w-1.5 rounded-full bg-[#72B494]"></span>

                        <span class="text-[9px] font-medium text-[#718B94]">
                            Your messages are private
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </header>



    {{-- =========================================================
    MAIN
    ========================================================== --}}

    <main class="mx-auto max-w-7xl px-5 py-6 sm:px-8 lg:px-10">

        <div
            class="grid min-h-[720px] overflow-hidden rounded-[30px] border border-[#D7E9ED] bg-white shadow-[0_12px_40px_rgba(56,102,116,.04)] lg:grid-cols-[320px_1fr]">


            {{-- =================================================
            CONVERSATIONS SIDEBAR
            ================================================== --}}

            <aside class="border-b border-[#E1ECEF] bg-[#FAFCFD] lg:border-b-0 lg:border-r">

                {{-- Search --}}
                <div class="border-b border-[#E5EEF0] p-5">

                    <div class="relative">

                        <x-tabler-search class="absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-[#A0B0B5]" />

                        <input type="text" placeholder="Search conversations..."
                            class="w-full rounded-xl border border-[#DFEAED] bg-white py-2.5 pl-10 pr-4 text-[10px] text-[#617C86] outline-none placeholder:text-[#A5B2B6] focus:border-[#BFDDE5] focus:ring-2 focus:ring-[#EAF6F8]" />

                    </div>

                </div>


                {{-- Conversation heading --}}
                <div class="flex items-center justify-between px-5 pb-2 pt-5">

                    <span class="text-[9px] font-bold uppercase tracking-[0.16em] text-[#9AAEB4]">
                        Conversations
                    </span>

                    <span class="rounded-full bg-[#EAF6F8] px-2 py-1 text-[8px] font-bold text-[#6498A8]">
                        2
                    </span>

                </div>


                {{-- Active conversation --}}
                <button class="w-full px-3 text-left">

                    <div class="rounded-2xl bg-[#E7F5F8] p-4">

                        <div class="flex gap-3">

                            <div class="relative shrink-0">

                                <div
                                    class="flex h-11 w-11 items-center justify-center rounded-[15px] bg-[#D3EBF0] text-xs font-semibold text-[#6098AA]">
                                    AM
                                </div>

                                <span
                                    class="absolute -bottom-0.5 -right-0.5 h-3 w-3 rounded-full border-2 border-[#E7F5F8] bg-[#72B494]"></span>

                            </div>


                            <div class="min-w-0 flex-1">

                                <div class="flex items-center justify-between gap-2">

                                    <span class="text-xs font-semibold text-[#4E6F7B]">
                                        Dr. Amelia Morgan
                                    </span>

                                    <span class="text-[8px] text-[#82A0A8]">
                                        10:42 AM
                                    </span>

                                </div>

                                <div class="mt-1 text-[9px] font-medium text-[#70909A]">
                                    Clinical Psychologist
                                </div>

                                <p class="mt-2 truncate text-[10px] text-[#78939C]">
                                    I'll see you Thursday. Take care until then...
                                </p>

                            </div>

                        </div>

                    </div>

                </button>


                {{-- Second conversation --}}
                <button class="w-full px-3 pt-1 text-left">

                    <div class="rounded-2xl p-4 transition hover:bg-white">

                        <div class="flex gap-3">

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-[15px] bg-[#F0F5F6] text-[#829BA3]">
                                SC
                            </div>


                            <div class="min-w-0 flex-1">

                                <div class="flex items-center justify-between gap-2">

                                    <span class="text-xs font-semibold text-[#667F88]">
                                        Serenity Care
                                    </span>

                                    <span class="text-[8px] text-[#A1AFB3]">
                                        Sep 24
                                    </span>

                                </div>

                                <div class="mt-1 text-[9px] text-[#99A9AE]">
                                    Care support
                                </div>

                                <p class="mt-2 truncate text-[10px] text-[#8EA0A6]">
                                    Your appointment has been confirmed.
                                </p>

                            </div>

                        </div>

                    </div>

                </button>


                {{-- New conversation --}}
                <div class="mt-auto p-4">

                    <button
                        class="flex w-full items-center justify-center gap-2 rounded-xl border border-dashed border-[#CFE2E7] bg-white py-3 text-[10px] font-semibold text-[#6795A2] transition hover:border-[#B7D6DF] hover:bg-[#F8FCFD]">
                        <x-tabler-message-plus class="h-4 w-4" />
                        Start a conversation
                    </button>

                </div>

            </aside>



            {{-- =================================================
            CHAT
            ================================================== --}}

            <section class="flex min-h-[700px] min-w-0 flex-col">


                {{-- Chat header --}}
                <header class="flex items-center justify-between border-b border-[#E2ECEF] bg-white px-5 py-4 sm:px-7">

                    <div class="flex min-w-0 items-center gap-3">

                        <div class="relative shrink-0">

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-[13px] bg-[#DCEFF3] text-[10px] font-semibold text-[#6099AA]">
                                AM
                            </div>

                            <span
                                class="absolute -bottom-0.5 -right-0.5 h-3 w-3 rounded-full border-2 border-white bg-[#72B494]"></span>

                        </div>


                        <div class="min-w-0">

                            <div class="flex items-center gap-2">

                                <h2 class="truncate text-xs font-semibold text-[#4D6E79]">
                                    Dr. Amelia Morgan
                                </h2>

                                <span
                                    class="hidden rounded-full bg-[#EDF7F1] px-2 py-1 text-[7px] font-bold uppercase tracking-wider text-[#6D9881] sm:inline-flex">
                                    Available
                                </span>

                            </div>

                            <p class="mt-0.5 text-[9px] text-[#99A9AE]">
                                Clinical Psychologist · Usually replies within 1 day
                            </p>

                        </div>

                    </div>


                    <div class="flex items-center gap-1">

                        <button
                            class="flex h-9 w-9 items-center justify-center rounded-xl text-[#91A5AC] transition hover:bg-[#F4F9FA] hover:text-[#618D9A]">
                            <x-tabler-phone class="h-4 w-4" />
                        </button>

                        <button
                            class="flex h-9 w-9 items-center justify-center rounded-xl text-[#91A5AC] transition hover:bg-[#F4F9FA] hover:text-[#618D9A]">
                            <x-tabler-video class="h-4 w-4" />
                        </button>

                        <button
                            class="flex h-9 w-9 items-center justify-center rounded-xl text-[#91A5AC] transition hover:bg-[#F4F9FA] hover:text-[#618D9A]">
                            <x-tabler-dots-vertical class="h-4 w-4" />
                        </button>

                    </div>

                </header>



                {{-- Safety / expectation banner --}}
                <div class="border-b border-[#E5EFF1] bg-[#F8FCFD] px-5 py-3 sm:px-7">

                    <div class="flex items-start gap-2.5">

                        <x-tabler-info-circle class="mt-0.5 h-3.5 w-3.5 shrink-0 text-[#82A4AE]" />

                        <p class="text-[9px] leading-4 text-[#8B9FA6]">
                            Messaging is for between-session support and
                            non-urgent communication. For urgent or emergency
                            concerns, please use your local emergency or crisis services.
                        </p>

                    </div>

                </div>



                {{-- =================================================
                MESSAGES
                ================================================== --}}

                <div class="flex-1 overflow-y-auto bg-[#FCFEFE] px-5 py-6 sm:px-8">

                    {{-- Date --}}
                    <div class="mb-7 flex items-center gap-3">

                        <div class="h-px flex-1 bg-[#E8EFF1]"></div>

                        <span class="text-[8px] font-bold uppercase tracking-[0.16em] text-[#A5B2B6]">
                            Today
                        </span>

                        <div class="h-px flex-1 bg-[#E8EFF1]"></div>

                    </div>


                    {{-- Therapist message --}}
                    <div class="flex items-end gap-2.5">

                        <div
                            class="hidden h-7 w-7 shrink-0 items-center justify-center rounded-[10px] bg-[#DCEFF3] text-[7px] font-semibold text-[#6498A9] sm:flex">
                            AM
                        </div>


                        <div class="max-w-[78%] sm:max-w-[65%]">

                            <div
                                class="rounded-[20px] rounded-bl-md bg-white px-4 py-3.5 shadow-[0_3px_14px_rgba(52,91,103,.04)] ring-1 ring-[#E3ECEF]">

                                <p class="text-[11px] leading-5 text-[#647F89]">
                                    Hi! I wanted to check in after our session
                                    yesterday. How are you feeling about what
                                    we talked through?
                                </p>

                            </div>

                            <div class="mt-1.5 ml-1 text-[8px] text-[#A2AFB4]">
                                Dr. Morgan · 9:18 AM
                            </div>

                        </div>

                    </div>


                    {{-- User message --}}
                    <div class="mt-5 flex justify-end">

                        <div class="max-w-[78%] sm:max-w-[65%]">

                            <div class="rounded-[20px] rounded-br-md bg-[#DFF1F4] px-4 py-3.5">

                                <p class="text-[11px] leading-5 text-[#587985]">
                                    I think I'm starting to notice the pattern
                                    we talked about. I caught myself doing it
                                    twice yesterday.
                                </p>

                            </div>

                            <div class="mt-1.5 mr-1 text-right text-[8px] text-[#A2AFB4]">
                                9:36 AM · Seen
                            </div>

                        </div>

                    </div>


                    {{-- Therapist message --}}
                    <div class="mt-5 flex items-end gap-2.5">

                        <div
                            class="hidden h-7 w-7 shrink-0 items-center justify-center rounded-[10px] bg-[#DCEFF3] text-[7px] font-semibold text-[#6498A9] sm:flex">
                            AM
                        </div>


                        <div class="max-w-[78%] sm:max-w-[65%]">

                            <div
                                class="rounded-[20px] rounded-bl-md bg-white px-4 py-3.5 shadow-[0_3px_14px_rgba(52,91,103,.04)] ring-1 ring-[#E3ECEF]">

                                <p class="text-[11px] leading-5 text-[#647F89]">
                                    That's really useful to notice. Remember,
                                    the goal isn't to stop the pattern immediately.
                                    Noticing it is already part of the work.
                                </p>

                            </div>

                            <div class="mt-1.5 ml-1 text-[8px] text-[#A2AFB4]">
                                Dr. Morgan · 10:02 AM
                            </div>

                        </div>

                    </div>


                    {{-- User message --}}
                    <div class="mt-5 flex justify-end">

                        <div class="max-w-[78%] sm:max-w-[65%]">

                            <div class="rounded-[20px] rounded-br-md bg-[#DFF1F4] px-4 py-3.5">

                                <p class="text-[11px] leading-5 text-[#587985]">
                                    That actually makes me feel a little less
                                    pressured about it. Thank you.
                                </p>

                            </div>

                            <div class="mt-1.5 mr-1 text-right text-[8px] text-[#A2AFB4]">
                                10:31 AM · Seen
                            </div>

                        </div>

                    </div>


                    {{-- Therapist final --}}
                    <div class="mt-5 flex items-end gap-2.5">

                        <div
                            class="hidden h-7 w-7 shrink-0 items-center justify-center rounded-[10px] bg-[#DCEFF3] text-[7px] font-semibold text-[#6498A9] sm:flex">
                            AM
                        </div>


                        <div class="max-w-[78%] sm:max-w-[65%]">

                            <div
                                class="rounded-[20px] rounded-bl-md bg-white px-4 py-3.5 shadow-[0_3px_14px_rgba(52,91,103,.04)] ring-1 ring-[#E3ECEF]">

                                <p class="text-[11px] leading-5 text-[#647F89]">
                                    You're welcome. I'll see you Thursday.
                                    Take care until then 🌿
                                </p>

                            </div>

                            <div class="mt-1.5 ml-1 text-[8px] text-[#A2AFB4]">
                                Dr. Morgan · 10:42 AM
                            </div>

                        </div>

                    </div>


                    {{-- Yesterday --}}
                    <div class="my-8 flex items-center gap-3">

                        <div class="h-px flex-1 bg-[#E8EFF1]"></div>

                        <span class="text-[8px] font-bold uppercase tracking-[0.16em] text-[#A5B2B6]">
                            Earlier this week
                        </span>

                        <div class="h-px flex-1 bg-[#E8EFF1]"></div>

                    </div>


                    {{-- Shared resource --}}
                    <div class="mx-auto max-w-md rounded-[20px] border border-[#DCECEF] bg-[#F5FAFB] p-4">

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-[#6B9EAC]">
                                <x-tabler-book-2 class="h-4 w-4" />
                            </div>

                            <div class="min-w-0 flex-1">

                                <div class="text-[8px] font-bold uppercase tracking-[0.12em] text-[#8DA5AC]">
                                    Shared by Dr. Morgan
                                </div>

                                <div class="mt-1 text-[10px] font-semibold text-[#607D87]">
                                    Noticing Your Inner Critic
                                </div>

                            </div>

                            <x-tabler-arrow-up-right class="h-4 w-4 text-[#91A8AE]" />

                        </div>

                    </div>

                </div>



                {{-- =================================================
                COMPOSER
                ================================================== --}}

                <div class="border-t border-[#E1ECEF] bg-white p-4 sm:p-5">

                    <div
                        class="rounded-[20px] border border-[#DCECEF] bg-[#FAFCFD] p-2 focus-within:border-[#BCDCE4] focus-within:ring-2 focus-within:ring-[#EDF7F9]">

                        <textarea rows="2" placeholder="Write a message to Dr. Morgan..."
                            class="w-full resize-none border-0 bg-transparent px-3 py-2 text-[11px] leading-5 text-[#607B85] outline-none placeholder:text-[#A6B3B7]"></textarea>


                        <div class="flex items-center justify-between px-2 pb-1">

                            <div class="flex items-center gap-1">

                                <button
                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#9AACB2] transition hover:bg-white hover:text-[#6595A3]">
                                    <x-tabler-paperclip class="h-4 w-4" />
                                </button>

                                <button
                                    class="flex h-8 w-8 items-center justify-center rounded-lg text-[#9AACB2] transition hover:bg-white hover:text-[#6595A3]">
                                    <x-tabler-mood-smile class="h-4 w-4" />
                                </button>

                            </div>


                            <button
                                class="flex h-9 items-center gap-2 rounded-xl bg-[#5AA7C2] px-4 text-[10px] font-semibold text-white transition hover:bg-[#4D99B4]">
                                Send
                                <x-tabler-send class="h-3.5 w-3.5" />
                            </button>

                        </div>

                    </div>


                    <div class="mt-2 flex items-center justify-center gap-1.5">

                        <x-tabler-lock class="h-3 w-3 text-[#A2B1B5]" />

                        <span class="text-[8px] text-[#A0AEB3]">
                            Messages are private and part of your care space.
                        </span>

                    </div>

                </div>

            </section>

        </div>


        {{-- =========================================================
        BOTTOM CARE NOTE
        ========================================================== --}}

        <div
            class="mt-5 flex flex-col gap-4 rounded-[22px] border border-[#DCECEF] bg-white px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

            <div class="flex items-start gap-3">

                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#EAF6F8] text-[#6A9EAC]">
                    <x-tabler-heart-handshake class="h-4 w-4" />
                </div>

                <div>

                    <div class="text-[10px] font-semibold text-[#627D87]">
                        Need more support?
                    </div>

                    <p class="mt-1 text-[9px] leading-4 text-[#99A9AE]">
                        You can book an additional session if you need dedicated
                        time with your therapist.
                    </p>

                </div>

            </div>


            <button
                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl border border-[#D5E8EC] bg-[#F9FCFD] px-4 py-2.5 text-[9px] font-semibold text-[#628F9E]">
                <x-tabler-calendar-plus class="h-3.5 w-3.5" />
                Book a session
            </button>

        </div>


        <div class="h-8"></div>

    </main>

</div>