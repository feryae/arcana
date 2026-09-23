<div>

    <x-flash-message />

    {{-- Header --}}
    <div class="mb-8 flex items-center justify-between">
        <div>
            <p class="text-[9px] uppercase tracking-[0.3em] text-[#806337]">The Archive</p>
            <h1 class="mt-1 font-serif text-3xl text-[#e8dfca]">Records</h1>
        </div>

        <button wire:click="openCreate"
            class="bg-[#806337] px-5 py-3 text-[9px] font-semibold uppercase tracking-[0.2em] text-[#eee5d1] transition hover:bg-[#967744]">
            Add Record
        </button>
    </div>


    <div class="mb-8 grid grid-cols-2 border border-[#2c2922] bg-[#151310] sm:grid-cols-3">
        <div class="border-b border-r border-[#2c2922] p-5 sm:border-b-0">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Records Shown</p>
            <p class="mt-2 font-serif text-3xl text-[#d8c8a8]">{{ $summary['total'] }}</p>
        </div>
        <div class="border-b border-r border-[#2c2922] p-5 sm:border-b-0">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Confidential</p>
            <p class="mt-2 font-serif text-3xl text-[#d8c8a8]">{{ $summary['confidentialCount'] }}</p>
        </div>
        <div class="p-5">
            <p class="text-[9px] uppercase tracking-[0.25em] text-[#806337]">Most Significant</p>
            <p class="mt-2 font-serif text-lg text-[#b98967]">
                {{ $summary['mostSignificant']?->title ?? '—' }}
                @if ($summary['mostSignificant'])
                    <span class="text-sm text-[#756d5e]">({{ $summary['mostSignificant']->importance }})</span>
                @endif
            </p>
        </div>
    </div>


    {{-- Filters --}}
    <div class="mb-6 border border-[#2c2922] bg-[#151310] p-5">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div class="col-span-full">
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Search</label>
                <input wire:model.live.debounce.400ms="search" placeholder="Title, excerpt, content..."
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Category</label>
                <select wire:model.live="categoryFilter"
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
                    <option value="">Any</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c }}">{{ $c }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Era</label>
                <select wire:model.live="eraFilter"
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
                    <option value="">Any</option>
                    @foreach ($eras as $e)
                        <option value="{{ $e }}">{{ $e }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Importance</label>
                <select wire:model.live="importanceFilter"
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
                    <option value="">Any</option>
                    @foreach ($importances as $i)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Access</label>
                <select wire:model.live="confidentialFilter"
                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">
                    <option value="">Any</option>
                    <option value="0">Public</option>
                    <option value="1">Confidential</option>
                </select>
            </div>

            <div x-data="{ open: false }">
                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Author</label>

                <div class="relative" @click.outside="open = false">
                    <input type="text" wire:model.live.debounce.300ms="authorFilterSearch" @focus="open = true"
                        placeholder="Search authors..."
                        class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">

                    <div x-show="open" x-cloak
                        class="absolute z-20 mt-1 max-h-48 w-full overflow-y-auto border border-[#3b3225] bg-[#151310] shadow-lg">
                        <button type="button" wire:click="clearAuthorFilter" @click="open = false"
                            class="block w-full px-3 py-2 text-left text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:bg-[#1a1712]">
                            Any
                        </button>
                        @forelse ($this->authorFilterResults as $a)
                            <button type="button" wire:click="selectAuthorFilter('{{ $a->id }}')" @click="open = false"
                                class="block w-full px-3 py-2 text-left text-xs {{ (string) $authorFilter === (string) $a->id ? 'bg-[#806337]/20 text-[#c59b4a]' : 'text-[#c8b895]' }} hover:bg-[#1a1712]">
                                {{ $a->name }}
                            </button>
                        @empty
                            <p class="px-3 py-2 text-xs text-[#625744]">No matches</p>
                        @endforelse
                    </div>
                </div>

                @if ($authorFilterName)
                    <div class="mt-1.5 flex items-center gap-1.5">
                        <span class="text-[10px] text-[#a17e43]">{{ $authorFilterName }}</span>
                        <button type="button" wire:click="clearAuthorFilter"
                            class="text-[10px] text-[#625744] hover:text-[#c14545]">×</button>
                    </div>
                @endif
            </div>
        </div>

        @if ($search || $categoryFilter || $eraFilter || $importanceFilter || $confidentialFilter !== '' || $authorFilter)
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
            <table class="w-full min-w-[900px] text-left">
                <thead>
                    <tr class="border-b border-[#2c2922] text-[8px] uppercase tracking-[0.2em] text-[#625744]">
                        @foreach (['title' => 'Title', 'category' => 'Category', 'era' => 'Era', 'importance' => 'Importance'] as $col => $label)
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

                        <th class="whitespace-nowrap px-5 py-4">Author</th>
                        <th class="whitespace-nowrap px-5 py-4">Access</th>
                        <th class="whitespace-nowrap px-5 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[#2c2922]/60">
                    @forelse ($records as $record)
                                        <tr class="transition hover:bg-[#191611]">
                                            <td class="px-5 py-4">
                                                <button wire:click="openView('{{ $record->slug }}')" class="text-left">
                                                    <div class="font-serif text-sm text-[#ddd2bb]">{{ $record->title }}</div>
                                                    <div class="text-[9px] uppercase tracking-[0.15em] text-[#625744]">
                                                        {{ $record->date ?: 'Undated' }}</div>
                                                </button>
                                            </td>

                                            <td class="px-5 py-4 text-xs text-[#8f826b]">{{ $record->category }}</td>
                                            <td class="px-5 py-4 text-xs text-[#8f826b]">{{ $record->era }}</td>

                                            <td class="px-5 py-4 text-[9px] uppercase tracking-[0.15em]
                                                    {{ match ($record->importance) {
                            'Critical' => 'text-[#c14545]',
                            'Important' => 'text-[#b98967]',
                            default => 'text-[#8f826b]',
                        } }}">
                                                {{ $record->importance }}
                                            </td>

                                            <td class="px-5 py-4 text-xs text-[#8f826b]">{{ $record->author->name ?? 'Unknown' }}</td>

                                            <td class="px-5 py-4 text-[9px] uppercase tracking-[0.15em]">
                                                @if ($record->confidential)
                                                    <span class="text-[#c14545]">Confidential</span>
                                                @else
                                                    <span class="text-[#625744]">Public</span>
                                                @endif
                                            </td>

                                            <td class="px-5 py-4">
                                                <div class="flex items-center justify-end gap-4 text-[9px] uppercase tracking-[0.15em]">
                                                    <button wire:click="openEdit('{{ $record->slug }}')"
                                                        class="text-[#a17e43] transition hover:text-[#c59b4a]">Edit</button>
                                                    <button wire:click="openDelete('{{ $record->slug }}')"
                                                        class="text-[#857861] transition hover:text-[#c14545]">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-16 text-center">
                                @if ($search || $categoryFilter || $eraFilter || $importanceFilter || $confidentialFilter !== '' || $authorFilter)
                                    <p class="font-serif text-sm text-[#8f826b]">No records match these filters.</p>
                                    <p class="mt-1 text-xs text-[#625744]">
                                        <button wire:click="clearFilters" class="underline hover:text-[#c8b895]">Clear
                                            filters</button>
                                        to see the full archive.
                                    </p>
                                @else
                                    <p class="font-serif text-sm text-[#8f826b]">No records archived.</p>
                                    <p class="mt-1 text-xs text-[#625744]">Begin by adding the first entry.</p>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile --}}
        <div class="divide-y divide-[#2c2922]/60 md:hidden">
            @forelse ($records as $record)
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <button wire:click="openView('{{ $record->slug }}')" class="min-w-0 text-left">
                                    <div class="font-serif text-base text-[#ddd2bb]">{{ $record->title }}</div>
                                    <div class="mt-1 text-[9px] uppercase tracking-[0.15em] text-[#625744]">
                                        {{ $record->date ?: 'Undated' }}</div>
                                </button>
                                <div class="shrink-0 text-right">
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Importance</div>
                                    <div class="mt-1 text-sm font-semibold
                                            {{ match ($record->importance) {
                    'Critical' => 'text-[#c14545]',
                    'Important' => 'text-[#b98967]',
                    default => 'text-[#8f826b]',
                } }}">
                                        {{ $record->importance }}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 grid grid-cols-2 gap-x-6 gap-y-4">
                                <div>
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Category</div>
                                    <div class="mt-1 text-xs text-[#8f826b]">{{ $record->category }}</div>
                                </div>
                                <div>
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Era</div>
                                    <div class="mt-1 text-xs text-[#8f826b]">{{ $record->era }}</div>
                                </div>
                                <div>
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Author</div>
                                    <div class="mt-1 text-xs text-[#8f826b]">{{ $record->author->name ?? 'Unknown' }}</div>
                                </div>
                                <div>
                                    <div class="text-[8px] uppercase tracking-[0.15em] text-[#625744]">Access</div>
                                    <div
                                        class="mt-1 text-[9px] uppercase tracking-[0.15em] {{ $record->confidential ? 'text-[#c14545]' : 'text-[#625744]' }}">
                                        {{ $record->confidential ? 'Confidential' : 'Public' }}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 flex items-center justify-end gap-5 border-t border-[#2c2922]/60 pt-4">
                                <button wire:click="openEdit('{{ $record->slug }}')"
                                    class="text-[9px] uppercase tracking-[0.15em] text-[#a17e43] transition hover:text-[#c59b4a]">Edit</button>
                                <button wire:click="openDelete('{{ $record->slug }}')"
                                    class="text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:text-[#c14545]">Delete</button>
                            </div>
                        </div>
            @empty
                <div class="px-5 py-16 text-center">
                    @if ($search || $categoryFilter || $eraFilter || $importanceFilter || $confidentialFilter !== '' || $authorFilter)
                        <p class="font-serif text-sm text-[#8f826b]">No records match these filters.</p>
                        <p class="mt-1 text-xs text-[#625744]">
                            <button wire:click="clearFilters" class="underline hover:text-[#c8b895]">Clear filters</button>
                            to see the full archive.
                        </p>
                    @else
                        <p class="font-serif text-sm text-[#8f826b]">No records archived.</p>
                        <p class="mt-1 text-xs text-[#625744]">Begin by adding the first entry.</p>
                    @endif
                </div>
            @endforelse
        </div>
    </div>


    {{-- Pagination --}}
    <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-[9px] uppercase tracking-[0.15em] text-[#625744]">
            Showing {{ $records->count() }} of {{ $summary['total'] }}
        </p>

        <div class="flex w-full gap-2 sm:w-auto">
            <button wire:click="goToCursor('{{ $records->previousCursor()?->encode() }}')" @if (!$records->previousCursor()) disabled @endif
                class="flex-1 border border-[#3b3225] px-4 py-2 text-[9px] uppercase tracking-[0.15em] text-[#857861] transition hover:border-[#806337]/40 hover:text-[#c8b895] disabled:opacity-30 sm:flex-none">
                ← Previous
            </button>

            <button wire:click="goToCursor('{{ $records->nextCursor()?->encode() }}')" @if (!$records->hasMorePages())
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
                            <span class="text-[9px] uppercase tracking-[0.28em] text-[#a17e43]">{{ $selected->category }}</span>
                            @if ($selected->confidential)
                                <span class="ml-auto text-[9px] uppercase tracking-[0.2em] text-[#c14545]">Confidential</span>
                            @endif
                        </div>

                        <h2 class="font-serif text-3xl text-[#e8dfca]">{{ $selected->title }}</h2>
                        <p class="mt-1 text-xs uppercase tracking-[0.2em] text-[#806337]">{{ $selected->era }} ·
                            {{ $selected->date ?: 'Undated' }}</p>

                        <p class="mt-5 whitespace-pre-line text-sm leading-7 text-[#8f826b]">
                            {{ $selected->content ?: ($selected->excerpt ?? 'No content on file.') }}</p>

                        <div class="mt-7 grid grid-cols-2 gap-5 border-t border-[#2c2922] pt-6 text-xs">
                            <div>
                                <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Author</p>
                                <p class="mt-1 text-[#cdbd9e]">{{ $selected->author->name ?? 'Unknown' }}</p>
                            </div>
                            <div>
                                <p class="text-[#625744] uppercase tracking-[0.15em] text-[8px]">Importance</p>
                                <p class="mt-1 font-semibold
                                            {{ match ($selected->importance) {
                        'Critical' => 'text-[#c14545]',
                        'Important' => 'text-[#b98967]',
                        default => 'text-[#cdbd9e]',
                    } }}">
                                    {{ $selected->importance }}
                                </p>
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
                        <span class="text-[9px] uppercase tracking-[0.28em] text-[#c14545]">Strike from the Archive</span>
                    </div>

                    <h2 class="font-serif text-2xl text-[#e8dfca]">Remove {{ $selected->title }}?</h2>
                    <p class="mt-3 text-sm leading-6 text-[#8f826b]">
                        This permanently erases <span class="text-[#cdbd9e]">{{ $selected->title }}</span> from the archive.
                        This cannot be undone.
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
                        {{ $modalMode === 'edit' ? 'Amend Record' : 'Add a New Record' }}
                    </h2>

                    <form wire:submit="save" class="space-y-4">
                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Title</label>
                            <input wire:model="title"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                            @error('title')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Excerpt</label>
                            <textarea wire:model="excerpt" rows="2"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]"></textarea>
                            @error('excerpt')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Content</label>
                            <textarea wire:model="content" rows="6"
                                class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]"></textarea>
                            @error('content')
                            <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label
                                    class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Category</label>
                                <select wire:model="category"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                    @foreach ($categories as $c)
                                        <option value="{{ $c }}">{{ $c }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Era</label>
                                <select wire:model="era"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                    @foreach ($eras as $e)
                                        <option value="{{ $e }}">{{ $e }}</option>
                                    @endforeach
                                </select>
                                @error('era')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Date</label>
                                <input wire:model="date" placeholder="e.g. Year 411"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                @error('date')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>

                            <div x-data="{ open: false }">
                                <label class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Author</label>

                                <div class="relative" @click.outside="open = false">
                                    <input type="text" wire:model.live.debounce.300ms="authorFormSearch" @focus="open = true"
                                        placeholder="Search authors..."
                                        class="w-full border border-[#3b3225] bg-[#0d0c0a] px-3 py-2.5 text-xs text-[#e8dfca] outline-none focus:border-[#806337]">

                                    <div x-show="open" x-cloak
                                        class="absolute z-20 mt-1 max-h-48 w-full overflow-y-auto border border-[#3b3225] bg-[#151310] shadow-lg">
                                        <button type="button" wire:click="clearAuthorForm" @click="open = false"
                                            class="block w-full px-3 py-2 text-left text-[9px] uppercase tracking-[0.15em] text-[#857861] hover:bg-[#1a1712]">
                                            Unknown
                                        </button>

                                        @forelse ($this->authorFormResults as $option)
                                            <button type="button" wire:click="selectAuthorForm('{{ $option['id'] }}')"
                                                @click="open = false"
                                                class="block w-full px-3 py-2 text-left text-xs {{ (string) $authorId === (string) $option['id'] ? 'bg-[#806337]/20 text-[#c59b4a]' : 'text-[#c8b895]' }} hover:bg-[#1a1712]">
                                                {{ $option['label'] }}
                                            </button>
                                        @empty
                                            <p class="px-3 py-2 text-xs text-[#625744]">No matches</p>
                                        @endforelse
                                    </div>
                                </div>

                                @if ($authorName)
                                    <div class="mt-1.5 flex items-center gap-1.5">
                                        <span class="text-[10px] text-[#a17e43]">{{ $authorName }}</span>
                                        <button type="button" wire:click="clearAuthorForm"
                                            class="text-[10px] text-[#625744] hover:text-[#c14545]">×</button>
                                    </div>
                                @endif

                                @error('authorId')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label
                                    class="mb-1.5 block text-[9px] uppercase tracking-[0.2em] text-[#806337]">Importance</label>
                                <select wire:model="importance"
                                    class="w-full border border-[#3b3225] bg-[#0d0c0a] px-4 py-2.5 text-sm text-[#e8dfca] outline-none focus:border-[#806337]">
                                    @foreach ($importances as $i)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endforeach
                                </select>
                                @error('importance')
                                <p class="mt-1.5 text-[10px] text-[#c14545]">{{ $message }}</p> @enderror
                            </div>

                            <div class="flex items-end pb-2.5">
                                <label class="flex items-center gap-2 text-xs text-[#c8b895]">
                                    <input type="checkbox" wire:model="confidential" class="accent-[#806337]">
                                    Restricted / confidential
                                </label>
                            </div>
                        </div>

                        <div class="flex gap-3 pt-2">
                            <button type="button" wire:click="closeModal"
                                class="flex-1 border border-[#3b3225] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#857861] hover:text-[#c8b895]">Cancel</button>
                            <button type="submit" wire:loading.attr="disabled" wire:target="save"
                                class="flex-1 bg-[#806337] px-4 py-3 text-[9px] font-semibold uppercase tracking-[0.18em] text-[#eee5d1] hover:bg-[#967744] disabled:opacity-50">
                                <span wire:loading.remove
                                    wire:target="save">{{ $modalMode === 'edit' ? 'Save Changes' : 'Add Record' }}</span>
                                <span wire:loading wire:target="save">Saving...</span>
                            </button>
                        </div>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>