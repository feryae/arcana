<div>

    <x-flash-message />

    {{-- Header --}}
    <div class="mb-8 flex items-center justify-between">
        <div>
            <p class="text-[9px] uppercase tracking-[0.3em] text-[#806337]">The Powers</p>
            <h1 class="mt-1 font-serif text-3xl text-[#e8dfca]">Factions</h1>
        </div>

        <button wire:click="openCreate"
            class="bg-[#806337] px-5 py-3 text-[9px] font-semibold uppercase tracking-[0.2em] text-[#eee5d1] transition hover:bg-[#967744]">
            Record Faction
        </button>
    </div>


    <div class="mb-8 grid grid-cols-2 border border-[#2c2922] bg-[#151310] sm:grid-cols-3">
        <div class="border-b border-r border-[#2c2922] p-5 sm:border-b-0">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Factions Shown</p>
            <p class="mt-2 font-serif text-3xl text-[#d8c8a8]">{{ $summary['total'] }}</p>
        </div>
        <div class="border-b border-r border-[#2c2922] p-5 sm:border-b-0">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Average Influence</p>
            <p class="mt-2 font-serif text-3xl text-[#d8c8a8]">{{ $summary['avgInfluence'] }}</p>
        </div>
        <div class="p-5">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Most Influential</p>
            <p class="mt-2 font-serif text-lg text-[#b98967]">
                {{ $summary['mostInfluential']?->name ?? '—' }}
                @if ($summary['mostInfluential'])
                    <span class="text-sm text-[#756d5e]">({{ $summary['mostInfluential']->influence }})</span>
                @endif
            </p>
        </div>
    </div>


    {{-- Filters --}}
    <div class="mb-6 border border-[#2c2922] bg-[#151310] p-5">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="col-span-full">
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Search</label>
                <input wire:model.live.debounce.400ms="search" placeholder="Name, title, leader..."
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Alignment</label>
                <select wire:model.live="alignmentFilter"
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
                    <option value="">Any</option>
                    @foreach ($alignments as $a)
                        <option value="{{ $a }}">{{ $a }}</option>
                    @endforeach
                </select>
            </div>

            <div x-data="{ open: false }">
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Headquarters</label>

                <div class="relative" @click.outside="open = false">
                    <input type="text" wire:model.live.debounce.300ms="kingdomFilterSearch" @focus="open = true"
                        placeholder="Search kingdoms..."
                        class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">

                    <div x-show="open" x-cloak
                        class="absolute z-20 mt-1 max-h-48 w-full overflow-y-auto border border-[#3b3225] bg-[#151310] shadow-lg">
                        <button type="button" wire:click="clearKingdomFilter" @click="open = false"
                            class="block w-full px-3 py-2 text-left text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:bg-[#1a1712]">
                            Any
                        </button>
                        @forelse ($this->kingdomFilterResults as $k)
                            <button type="button" wire:click="selectKingdomFilter('{{ $k->id }}')" @click="open = false"
                                class="block w-full px-3 py-2 text-left text-xs {{ (string) $kingdomFilter === (string) $k->id ? 'bg-[#806337]/20 text-[#c59b4a]' : 'text-[#c8b895]' }} hover:bg-[#1a1712]">
                                {{ $k->name }}
                            </button>
                        @empty
                            <p class="px-3 py-2 text-xs text-[#625744]">No matches</p>
                        @endforelse
                    </div>
                </div>

                @if ($kingdomFilterName)
                    <div class="mt-1.5 flex items-center gap-1.5">
                        <span class="text-[10px] text-[#a17e43]">{{ $kingdomFilterName }}</span>
                        <button type="button" wire:click="clearKingdomFilter"
                            class="text-[10px] text-[#625744] hover:text-[#c14545]">×</button>
                    </div>
                @endif
            </div>

            <div x-data="{ open: false }">
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Leader</label>

                <div class="relative" @click.outside="open = false">
                    <input type="text" wire:model.live.debounce.300ms="leaderFilterSearch" @focus="open = true"
                        placeholder="Search leaders..."
                        class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">

                    <div x-show="open" x-cloak
                        class="absolute z-20 mt-1 max-h-48 w-full overflow-y-auto border border-[#3b3225] bg-[#151310] shadow-lg">
                        <button type="button" wire:click="clearLeaderFilter" @click="open = false"
                            class="block w-full px-3 py-2 text-left text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:bg-[#1a1712]">
                            Any
                        </button>
                        @forelse ($this->leaderFilterResults as $l)
                            <button type="button" wire:click="selectLeaderFilter('{{ $l->id }}')" @click="open = false"
                                class="block w-full px-3 py-2 text-left text-xs {{ (string) $leaderFilter === (string) $l->id ? 'bg-[#806337]/20 text-[#c59b4a]' : 'text-[#c8b895]' }} hover:bg-[#1a1712]">
                                {{ $l->name }}
                            </button>
                        @empty
                            <p class="px-3 py-2 text-xs text-[#625744]">No matches</p>
                        @endforelse
                    </div>
                </div>

                @if ($leaderFilterName)
                    <div class="mt-1.5 flex items-center gap-1.5">
                        <span class="text-[10px] text-[#a17e43]">{{ $leaderFilterName }}</span>
                        <button type="button" wire:click="clearLeaderFilter"
                            class="text-[10px] text-[#625744] hover:text-[#c14545]">×</button>
                    </div>
                @endif
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">
                    Influence: {{ $minInfluence }}–{{ $maxInfluence }}
                </label>
                <div class="flex items-center gap-2 pt-2">
                    <input type="range" min="0" max="100" wire:model.live.debounce.300ms="minInfluence"
                        class="w-full accent-[#806337]">
                    <input type="range" min="0" max="100" wire:model.live.debounce.300ms="maxInfluence"
                        class="w-full accent-[#806337]">
                </div>
            </div>
        </div>

        @if ($search || $alignmentFilter || $kingdomFilter || $leaderFilter || $minInfluence > 0 || $maxInfluence < 100)
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
            <table class="w-full min-w-[800px] text-left">
                <thead>
                    <tr class="border-b border-[#2c2922] text-[8px] uppercase tracking-[0.2em] text-[#625744]">
                        @foreach (['name' => 'Name', 'alignment' => 'Alignment', 'influence' => 'Influence', 'status' => 'Status'] as $col => $label)
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

                        <th class="whitespace-nowrap px-5 py-4">Headquarters</th>
                        <th class="whitespace-nowrap px-5 py-4">Leader</th>
                        <th class="whitespace-nowrap px-5 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[#2c2922]/60">
                    @forelse ($factions as $faction)
                        <tr class="transition hover:bg-[#191611]">
                            <td class="px-5 py-4">
                                <button wire:click="openView('{{ $faction->slug }}')" class="text-left">
                                    <div class="font-serif text-sm text-[#ddd2bb]">{{ $faction->name }}</div>
                                    <div class="text-[9px] uppercase tracking-[0.15em] text-[#625744]">{{ $faction->title }}
                                    </div>
                                </button>
                            </td>

                            <td class="px-5 py-4 text-[9px] uppercase tracking-[0.15em] text-[#8f826b]">
                                {{ $faction->alignment }}
                            </td>

                            <td class="px-5 py-4 text-sm font-semibold text-[#d8c8a8]">
                                {{ $faction->influence }}
                            </td>

                            <td class="px-5 py-4 text-xs text-[#8f826b]">
                                {{ $faction->status }}
                            </td>

                            <td class="px-5 py-4 text-xs text-[#8f826b]">
                                {{ $faction->kingdom->name ?? 'Unknown' }}
                            </td>

                            <td class="px-5 py-4 text-xs text-[#8f826b]">
                                {{ $faction->leader->name ?? 'Unknown' }}
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-4 text-[9px] uppercase tracking-[0.15em]">
                                    <button wire:click="openEdit('{{ $faction->slug }}')"
                                        class="text-[#a17e43] transition hover:text-[#c59b4a]">Edit</button>
                                    <button wire:click="openDelete('{{ $faction->slug }}')"
                                        class="text-[#857861] transition hover:text-[#c14545]">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-16 text-center">
                                @if ($search || $alignmentFilter || $kingdomFilter || $leaderFilter || $minInfluence > 0 || $maxInfluence < 100)
                                    <p class="font-serif text-sm text-[#8f826b]">No factions match these filters.</p>
                                    <p class="mt-1 text-xs text-[#625744]">
                                        <button wire:click="clearFilters" class="underline hover:text-[#c8b895]">Clear
                                            filters</button>
                                        to see the full board.
                                    </p>
                                @else
                                    <p class="font-serif text-sm text-[#8f826b]">No factions recorded.</p>
                                    <p class="mt-1 text-xs text-[#625744]">Begin by charting the first power.</p>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile --}}
        <div class="divide-y divide-[#2c2922]/60 md:hidden">
            @forelse ($factions as $faction)
                <div class="p-5">
                    <div class="flex items-start justify-between gap-4">
                        <button wire:click="openView('{{ $faction->slug }}')" class="min-w-0 text-left">
                            <div class="font-serif text-base text-[#ddd2bb]">{{ $faction->name }}</div>
                            <div class="mt-1 text-[9px] uppercase tracking-[0.15em] text-[#625744]">{{ $faction->title }}
                            </div>
                        </button>
                        <div class="shrink-0 text-right">
                            <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Influence</div>
                            <div class="mt-1 text-sm font-semibold text-[#d8c8a8]">{{ $faction->influence }}</div>
                        </div>
                    </div>

                    <div class="mt-5 grid grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Headquarters</div>
                            <div class="mt-1 text-xs text-[#8f826b]">{{ $faction->kingdom->name ?? 'Unknown' }}</div>
                        </div>
                        <div>
                            <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Leader</div>
                            <div class="mt-1 text-xs text-[#8f826b]">{{ $faction->leader->name ?? 'Unknown' }}</div>
                        </div>
                        <div>
                            <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Status</div>
                            <div class="mt-1 text-xs text-[#8f826b]">{{ $faction->status }}</div>
                        </div>
                        <div>
                            <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Alignment</div>
                            <div class="mt-1 text-[9px] uppercase tracking-[0.15em] text-[#8f826b]">
                                {{ $faction->alignment }}</div>
                        </div>
                    </div>

                    <div class="mt-5 flex items-center justify-end gap-5 border-t border-[#2c2922]/60 pt-4">
                        <button wire:click="openEdit('{{ $faction->slug }}')"
                            class="text-[9px] uppercase tracking-[0.15em] text-[#a17e43] transition hover:text-[#c59b4a]">Edit</button>
                        <button wire:click="openDelete('{{ $faction->slug }}')"
                            class="text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:text-[#c14545]">Delete</button>
                    </div>
                </div>
            @empty
                <div class="px-5 py-16 text-center">
                    @if ($search || $alignmentFilter || $kingdomFilter || $leaderFilter || $minInfluence > 0 || $maxInfluence < 100)
                        <p class="font-serif text-sm text-[#8f826b]">No factions match these filters.</p>
                        <p class="mt-1 text-xs text-[#625744]">
                            <button wire:click="clearFilters" class="underline hover:text-[#c8b895]">Clear filters</button>
                            to see the full board.
                        </p>
                    @else
                        <p class="font-serif text-sm text-[#8f826b]">No factions recorded.</p>
                        <p class="mt-1 text-xs text-[#625744]">Begin by charting the first power.</p>
                    @endif
                </div>
            @endforelse
        </div>
    </div>


    {{-- Pagination --}}
    <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-[9px] uppercase tracking-[0.15em] text-[#625744]">
            Showing {{ $factions->count() }} of {{ $summary['total'] }}
        </p>

        <div class="flex w-full gap-2 sm:w-auto">
            <button wire:click="goToCursor('{{ $factions->previousCursor()?->encode() }}')" @if (!$factions->previousCursor()) disabled @endif
                class="flex-1 border border-[#3b3225] px-4 py-2 text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:border-[#806337]/40 hover:text-[#c8b895] disabled:opacity-30 sm:flex-none">
                ← Previous
            </button>

            <button wire:click="goToCursor('{{ $factions->nextCursor()?->encode() }}')" @if (!$factions->hasMorePages())
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
                    <div class="mb-6 flex items-center gap-3">
                        <span class="h-px w-8 bg-[#806337]"></span>
                        <span class="text-[9px] uppercase tracking-[0.28em] text-[#a17e43]">{{ $selected->type }}</span>
                    </div>

                    <h2 class="font-serif text-3xl text-[#e8dfca]">{{ $selected->name }}</h2>
                    <p class="mt-1 text-xs uppercase tracking-[0.2em] text-[#806337]">{{ $selected->title }}</p>

                    <p class="mt-5 text-sm leading-7 text-[#8f826b]">{{ $selected->description ?? 'No description recorded.' }}
                    </p>

                    <div class="mt-7 grid grid-cols-2 gap-5 border-t border-[#2c2922] pt-6 text-xs">
                        <div>
                            <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Leader</p>
                            <p class="mt-1 text-[#cdbd9e]">{{ $selected->leader->name ?? 'Unknown' }}</p>
                        </div>
                        <div>
                            <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Headquarters</p>
                            <p class="mt-1 text-[#cdbd9e]">{{ $selected->kingdom->name ?? 'Unknown' }}</p>
                        </div>
                        <div>
                            <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Members</p>
                            <p class="mt-1 text-[#cdbd9e]">{{ $selected->members ?? 'Unconfirmed' }}</p>
                        </div>
                        <div>
                            <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Alignment</p>
                            <p class="mt-1 text-[#cdbd9e]">{{ $selected->alignment }}</p>
                        </div>
                        <div>
                            <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Influence</p>
                            <p class="mt-1 font-semibold text-[#d8c8a8]">{{ $selected->influence }}</p>
                        </div>
                        <div>
                            <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Status</p>
                            <p class="mt-1 text-[#cdbd9e]">{{ $selected->status }}</p>
                        </div>
                    </div>

                    @if ($selected->status_description)
                        <div class="mt-5 border-t border-[#2c2922] pt-5">
                            <p class="mb-1.5 text-[9px] uppercase tracking-[0.2em] text-[#625744]">Latest Report</p>
                            <p class="text-sm leading-7 text-[#8f826b]">{{ $selected->status_description }}</p>
                        </div>
                    @endif

                    <div class="mt-8 flex gap-3">
                        <button wire:click="closeModal"
                            class="flex-1 border border-[#3b3225] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#857861] hover:text-[#c8b895]">Close</button>
                        <button wire:click="switchToEdit"
                            class="flex-1 bg-[#806337] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#eee5d1] hover:bg-[#967744]">Edit</button>
                    </div>

                @elseif ($modalMode === 'delete' && $selected)
                    <div class="mb-6 flex items-center gap-3">
                        <span class="h-px w-8 bg-[#c14545]/60"></span>
                        <span class="text-[9px] uppercase tracking-[0.28em] text-[#c14545]">Strike from the Record</span>
                    </div>

                    <h2 class="font-serif text-2xl text-[#e8dfca]">Remove {{ $selected->name }}?</h2>
                    <p class="mt-3 text-sm leading-6 text-[#8f826b]">
                        This permanently erases <span class="text-[#cdbd9e]">{{ $selected->name }}</span>,
                        {{ $selected->title }}, from the archive. This cannot be undone.
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
                        {{ $modalMode === 'edit' ? 'Amend Record' : 'Record a New Faction' }}
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
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Title</label>
                            <input wire:model="title" placeholder="e.g. Order of the Sacred Shield"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                            @error('title')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Description</label>
                            <textarea wire:model="description" rows="3"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]"></textarea>
                            @error('description')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Type</label>
                                <select wire:model="type"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                    @foreach ($types as $t)
                                        <option value="{{ $t }}">{{ $t }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>

                            <div x-data="{ open: false }">
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Leader</label>

                                <div class="relative" @click.outside="open = false">
                                    <input type="text" wire:model.live.debounce.300ms="leaderFormSearch" @focus="open = true"
                                        placeholder="Search leaders..."
                                        class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">

                                    <div x-show="open" x-cloak
                                        class="absolute z-20 mt-1 max-h-48 w-full overflow-y-auto border border-[#3b3225] bg-[#151310] shadow-lg">
                                        <button type="button" wire:click="clearLeaderForm" @click="open = false"
                                            class="block w-full px-3 py-2 text-left text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:bg-[#1a1712]">
                                            Unknown
                                        </button>

                                        @forelse ($this->leaderFormResults as $option)
                                            <button type="button" wire:click="selectLeaderForm('{{ $option['id'] }}')"
                                                @click="open = false"
                                                class="block w-full px-3 py-2 text-left text-xs {{ (string) $leaderId === (string) $option['id'] ? 'bg-[#806337]/20 text-[#c59b4a]' : 'text-[#c8b895]' }} hover:bg-[#1a1712]">
                                                {{ $option['label'] }}
                                            </button>
                                        @empty
                                            <p class="px-3 py-2 text-xs text-[#625744]">No matches</p>
                                        @endforelse
                                    </div>
                                </div>

                                @if ($leaderName)
                                    <div class="mt-1.5 flex items-center gap-1.5">
                                        <span class="text-[10px] text-[#a17e43]">{{ $leaderName }}</span>
                                        <button type="button" wire:click="clearLeaderForm"
                                            class="text-[10px] text-[#625744] hover:text-[#c14545]">×</button>
                                    </div>
                                @endif

                                @error('leaderId')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div x-data="{ open: false }">
                                <label
                                    class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Headquarters</label>

                                <div class="relative" @click.outside="open = false">
                                    <input type="text" wire:model.live.debounce.300ms="kingdomFormSearch" @focus="open = true"
                                        placeholder="Search kingdoms..."
                                        class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">

                                    <div x-show="open" x-cloak
                                        class="absolute z-20 mt-1 max-h-48 w-full overflow-y-auto border border-[#3b3225] bg-[#151310] shadow-lg">
                                        <button type="button" wire:click="clearKingdomForm" @click="open = false"
                                            class="block w-full px-3 py-2 text-left text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:bg-[#1a1712]">
                                            Unknown
                                        </button>

                                        @forelse ($this->kingdomFormResults as $option)
                                            <button type="button" wire:click="selectKingdomForm('{{ $option['id'] }}')"
                                                @click="open = false"
                                                class="block w-full px-3 py-2 text-left text-xs {{ (string) $kingdomId === (string) $option['id'] ? 'bg-[#806337]/20 text-[#c59b4a]' : 'text-[#c8b895]' }} hover:bg-[#1a1712]">
                                                {{ $option['label'] }}
                                            </button>
                                        @empty
                                            <p class="px-3 py-2 text-xs text-[#625744]">No matches</p>
                                        @endforelse
                                    </div>
                                </div>

                                @if ($kingdomName)
                                    <div class="mt-1.5 flex items-center gap-1.5">
                                        <span class="text-[10px] text-[#a17e43]">{{ $kingdomName }}</span>
                                        <button type="button" wire:click="clearKingdomForm"
                                            class="text-[10px] text-[#625744] hover:text-[#c14545]">×</button>
                                    </div>
                                @endif

                                @error('kingdomId')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Members</label>
                                <input wire:model="members" placeholder="e.g. 8,400"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                @error('members')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label
                                    class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Alignment</label>
                                <select wire:model="alignment"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                    @foreach ($alignments as $a)
                                        <option value="{{ $a }}">{{ $a }}</option>
                                    @endforeach
                                </select>
                                @error('alignment')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>
                            <div x-data="{ influence: @entangle('influence') }">
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">
                                    Influence — <span x-text="influence"></span>
                                </label>
                                <input type="range" min="0" max="100" x-model="influence" class="mt-3 w-full accent-[#806337]">
                            </div>
                        </div>

                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Status</label>
                            <select wire:model="status"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                @foreach ($statuses as $s)
                                    <option value="{{ $s }}">{{ $s }}</option>
                                @endforeach
                            </select>
                            @error('status')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Status
                                Report</label>
                            <textarea wire:model="statusDescription" rows="2"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]"></textarea>
                            @error('statusDescription')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex gap-3 pt-2">
                            <button type="button" wire:click="closeModal"
                                class="flex-1 border border-[#3b3225] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#857861] hover:text-[#c8b895]">Cancel</button>
                            <button type="submit" wire:loading.attr="disabled" wire:target="save"
                                class="flex-1 bg-[#806337] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#eee5d1] hover:bg-[#967744] disabled:opacity-50">
                                <span wire:loading.remove
                                    wire:target="save">{{ $modalMode === 'edit' ? 'Save Changes' : 'Record Faction' }}</span>
                                <span wire:loading wire:target="save">Saving...</span>
                            </button>
                        </div>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>