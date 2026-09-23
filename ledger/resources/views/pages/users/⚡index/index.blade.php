<div>

    <x-flash-message />

    {{-- Header --}}
    <div class="mb-8 flex items-center justify-between">
        <div>
            <p class="text-[9px] uppercase tracking-[0.3em] text-[#806337]">The Keep</p>
            <h1 class="mt-1 font-serif text-3xl text-[#e8dfca]">Users</h1>
        </div>

        <button wire:click="openCreate"
            class="bg-[#806337] px-5 py-3 text-[9px] font-semibold uppercase tracking-[0.2em] text-[#eee5d1] transition hover:bg-[#967744]">
            Add User
        </button>
    </div>


    <div class="mb-8 grid grid-cols-2 border border-[#2c2922] bg-[#151310] sm:grid-cols-3">
        <div class="border-b border-r border-[#2c2922] p-5 sm:border-b-0">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Users Shown</p>
            <p class="mt-2 font-serif text-3xl text-[#d8c8a8]">{{ $summary['total'] }}</p>
        </div>
        <div class="border-b border-r border-[#2c2922] p-5 sm:border-b-0">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Verified</p>
            <p class="mt-2 font-serif text-3xl text-[#d8c8a8]">{{ $summary['verifiedCount'] }}</p>
        </div>
        <div class="p-5">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Newest</p>
            <p class="mt-2 font-serif text-lg text-[#b98967]">
                {{ $summary['newest']?->name ?? '—' }}
            </p>
        </div>
    </div>


    {{-- Filters --}}
    <div class="mb-6 border border-[#2c2922] bg-[#151310] p-5">
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Search</label>
                <input wire:model.live.debounce.400ms="search" placeholder="Name or email..."
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Verification</label>
                <select wire:model.live="verifiedFilter"
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
                    <option value="">Any</option>
                    <option value="1">Verified</option>
                    <option value="0">Unverified</option>
                </select>
            </div>
        </div>

        @if ($search || $verifiedFilter !== '')
            <button wire:click="clearFilters"
                class="mt-4 text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:text-[#c59b4a]">
                Clear filters
            </button>
        @endif
    </div>


    {{-- Table --}}
    <div class="border border-[#2c2922] bg-[#151310]">
        {{-- Desktop / Tablet --}}
        <div class="hidden overflow-x-auto md:block">
            <table class="w-full min-w-[700px] text-left">
                <thead>
                    <tr class="border-b border-[#2c2922] text-[8px] uppercase tracking-[0.2em] text-[#625744]">
                        @foreach (['name' => 'Name', 'email' => 'Email', 'created_at' => 'Joined'] as $col => $label)
                            <th class="whitespace-nowrap px-5 py-4">
                                <button wire:click="sortByColumn('{{ $col }}')"
                                    class="flex items-center gap-1.5 transition hover:text-[#a17e43]">
                                    {{ $label }}

                                    @if ($sortBy === $col)
                                        <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                                    @endif
                                </button>
                            </th>
                        @endforeach

                        <th class="whitespace-nowrap px-5 py-4">Status</th>
                        <th class="whitespace-nowrap px-5 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[#2c2922]/60">
                    @forelse ($users as $user)
                        <tr class="transition hover:bg-[#191611]">
                            <td class="px-5 py-4">
                                <button wire:click="openView({{ $user->id }})" class="flex items-center gap-3 text-left">
                                    <span
                                        class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#806337]/20 text-[10px] font-semibold uppercase text-[#c59b4a]">
                                        {{ $user->initials() }}
                                    </span>
                                    <span class="font-serif text-sm text-[#ddd2bb]">{{ $user->name }}</span>
                                </button>
                            </td>

                            <td class="px-5 py-4 text-xs text-[#8f826b]">{{ $user->email }}</td>
                            <td class="px-5 py-4 text-xs text-[#8f826b]">{{ $user->created_at?->format('M j, Y') ?? '—' }}
                            </td>

                            <td class="px-5 py-4 text-[9px] uppercase tracking-[0.15em]">
                                @if ($user->email_verified_at)
                                    <span class="text-[#8fae7a]">Verified</span>
                                @else
                                    <span class="text-[#c59b4a]">Unverified</span>
                                @endif
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-4 text-[9px] uppercase tracking-[0.15em]">
                                    <button wire:click="openEdit({{ $user->id }})"
                                        class="text-[#a17e43] transition hover:text-[#c59b4a]">Edit</button>
                                    <button wire:click="openDelete({{ $user->id }})"
                                        class="text-[#857861] transition hover:text-[#c14545]">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-16 text-center">
                                @if ($search || $verifiedFilter !== '')
                                    <p class="font-serif text-sm text-[#8f826b]">No users match these filters.</p>
                                    <p class="mt-1 text-xs text-[#625744]">
                                        <button wire:click="clearFilters" class="underline hover:text-[#c8b895]">Clear
                                            filters</button>
                                        to see everyone.
                                    </p>
                                @else
                                    <p class="font-serif text-sm text-[#8f826b]">No users yet.</p>
                                    <p class="mt-1 text-xs text-[#625744]">Begin by adding the first account.</p>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile --}}
        <div class="divide-y divide-[#2c2922]/60 md:hidden">
            @forelse ($users as $user)
                <div class="p-5">
                    <div class="flex items-start justify-between gap-4">
                        <button wire:click="openView({{ $user->id }})" class="flex min-w-0 items-center gap-3 text-left">
                            <span
                                class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#806337]/20 text-[10px] font-semibold uppercase text-[#c59b4a]">
                                {{ $user->initials() }}
                            </span>
                            <span class="min-w-0">
                                <span class="block truncate font-serif text-base text-[#ddd2bb]">{{ $user->name }}</span>
                                <span class="block truncate text-xs text-[#625744]">{{ $user->email }}</span>
                            </span>
                        </button>
                        <div class="shrink-0 text-right">
                            <div
                                class="text-[9px] uppercase tracking-[0.15em] {{ $user->email_verified_at ? 'text-[#8fae7a]' : 'text-[#c59b4a]' }}">
                                {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 text-xs text-[#8f826b]">Joined {{ $user->created_at?->format('M j, Y') ?? '—' }}</p>

                    <div class="mt-5 flex items-center justify-end gap-5 border-t border-[#2c2922]/60 pt-4">
                        <button wire:click="openEdit({{ $user->id }})"
                            class="text-[9px] uppercase tracking-[0.15em] text-[#a17e43] transition hover:text-[#c59b4a]">Edit</button>
                        <button wire:click="openDelete({{ $user->id }})"
                            class="text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:text-[#c14545]">Delete</button>
                    </div>
                </div>
            @empty
                <div class="px-5 py-16 text-center">
                    @if ($search || $verifiedFilter !== '')
                        <p class="font-serif text-sm text-[#8f826b]">No users match these filters.</p>
                        <p class="mt-1 text-xs text-[#625744]">
                            <button wire:click="clearFilters" class="underline hover:text-[#c8b895]">Clear filters</button>
                            to see everyone.
                        </p>
                    @else
                        <p class="font-serif text-sm text-[#8f826b]">No users yet.</p>
                        <p class="mt-1 text-xs text-[#625744]">Begin by adding the first account.</p>
                    @endif
                </div>
            @endforelse
        </div>
    </div>


    {{-- Pagination --}}
    <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-[9px] uppercase tracking-[0.15em] text-[#625744]">
            Showing {{ $users->count() }} of {{ $summary['total'] }}
        </p>

        <div class="flex w-full gap-2 sm:w-auto">
            <button wire:click="goToCursor('{{ $users->previousCursor()?->encode() }}')" @if (!$users->previousCursor())
            disabled @endif
                class="flex-1 border border-[#3b3225] px-4 py-2 text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:border-[#806337]/40 hover:text-[#c8b895] disabled:opacity-30 sm:flex-none">
                ← Previous
            </button>

            <button wire:click="goToCursor('{{ $users->nextCursor()?->encode() }}')" @if (!$users->hasMorePages())
            disabled @endif
                class="flex-1 border border-[#3b3225] px-4 py-2 text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:border-[#806337]/40 hover:text-[#c8b895] disabled:opacity-30 sm:flex-none">
                Next →
            </button>
        </div>
    </div>

    {{-- Modal --}}
    <div x-data="{ show: @entangle('showModal') }" x-show="show" x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center px-6 py-10" style="display: none;">

        <div x-show="show" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" wire:click="closeModal"
            class="absolute inset-0 bg-[#0d0c0a]/85"></div>

        <div x-show="show" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" @keydown.escape.window="show = false"
            class="relative max-h-[90vh] w-full max-w-lg overflow-y-auto border border-[#806337]/40 bg-[#151310] p-8">
            @if ($showModal)
                @if ($modalMode === 'view' && $selected)
                    <div class="mb-6 flex items-center gap-4">
                        <span
                            class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-[#806337]/20 text-lg font-semibold uppercase text-[#c59b4a]">
                            {{ $selected->initials() }}
                        </span>
                        <div>
                            <h2 class="font-serif text-2xl text-[#e8dfca]">{{ $selected->name }}</h2>
                            <p class="mt-0.5 text-xs text-[#8f826b]">{{ $selected->email }}</p>
                        </div>
                    </div>

                    <div class="mt-7 grid grid-cols-2 gap-5 border-t border-[#2c2922] pt-6 text-xs">
                        <div>
                            <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Status</p>
                            <p class="mt-1 {{ $selected->email_verified_at ? 'text-[#8fae7a]' : 'text-[#c59b4a]' }}">
                                {{ $selected->email_verified_at ? 'Verified' : 'Unverified' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Joined</p>
                            <p class="mt-1 text-[#cdbd9e]">{{ $selected->created_at?->format('M j, Y') ?? '—' }}</p>
                        </div>
                    </div>

                    <div class="mt-8 flex gap-3">
                        <button wire:click="closeModal"
                            class="flex-1 border border-[#3b3225] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#857861] hover:text-[#c8b895]">Close</button>
                        <button wire:click="switchToEdit"
                            class="flex-1 bg-[#806337] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#eee5d1] hover:bg-[#967744]">Edit</button>
                    </div>

                @elseif ($modalMode === 'delete' && $selected)
                    <div class="mb-6 flex items-center gap-3">
                        <span class="h-px w-8 bg-[#c14545]/60"></span>
                        <span class="text-[9px] uppercase tracking-[0.28em] text-[#c14545]">Revoke Access</span>
                    </div>

                    <h2 class="font-serif text-2xl text-[#e8dfca]">Remove {{ $selected->name }}?</h2>
                    <p class="mt-3 text-sm leading-6 text-[#8f826b]">
                        This permanently deletes <span class="text-[#cdbd9e]">{{ $selected->email }}</span> and revokes all
                        access. This cannot be undone.
                    </p>

                    <div class="mt-8 flex gap-3">
                        <button wire:click="closeModal"
                            class="flex-1 border border-[#3b3225] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#857861] transition hover:border-[#806337]/40 hover:text-[#c8b895]">Cancel</button>
                        <button wire:click="confirmDelete" wire:loading.attr="disabled" wire:target="confirmDelete"
                            class="flex-1 bg-[#c14545] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#eee5d1] transition hover:bg-[#d65656] disabled:opacity-50">
                            <span wire:loading.remove wire:target="confirmDelete">Confirm Removal</span>
                            <span wire:loading wire:target="confirmDelete">Removing...</span>
                        </button>
                    </div>

                @else
                    <h2 class="mb-6 font-serif text-2xl text-[#e8dfca]">
                        {{ $modalMode === 'edit' ? 'Amend User' : 'Add a New User' }}
                    </h2>

                    <form wire:submit="save" class="space-y-4">
                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Name</label>
                            <input wire:model="name"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                            @error('name')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Email</label>
                            <input type="email" wire:model="email"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                            @error('email')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">
                                    Password{{ $modalMode === 'edit' ? ' (leave blank to keep)' : '' }}
                                </label>
                                <input type="password" wire:model="password"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                @error('password')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Confirm
                                    Password</label>
                                <input type="password" wire:model="password_confirmation"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                            </div>
                        </div>

                        <div>
                            <label class="flex items-center gap-2 text-xs text-[#c8b895]">
                                <input type="checkbox" wire:model="verified" class="accent-[#806337]">
                                Email verified
                            </label>
                        </div>

                        <div class="flex gap-3 pt-2">
                            <button type="button" wire:click="closeModal"
                                class="flex-1 border border-[#3b3225] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#857861] hover:text-[#c8b895]">Cancel</button>
                            <button type="submit" wire:loading.attr="disabled" wire:target="save"
                                class="flex-1 bg-[#806337] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#eee5d1] hover:bg-[#967744] disabled:opacity-50">
                                <span wire:loading.remove
                                    wire:target="save">{{ $modalMode === 'edit' ? 'Save Changes' : 'Add User' }}</span>
                                <span wire:loading wire:target="save">Saving...</span>
                            </button>
                        </div>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>