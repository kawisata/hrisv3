<div class="p-2 space-y-2 ">
    <div class="justify-start w-full flex flex-1">
        <div class="relative w-full max-w-xl mr-6 focus-within:text-gray-500">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg
                class="w-4 h-4"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
                >
                <path
                    fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"
                ></path>
                </svg>
            </div>
            <input
                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                type="text"
                placeholder="cari Nama/Jabatan/Unit"
                aria-label="Search"
                wire:model="search"
            />
        </div>
    </div>
    <div>
        <x-jet-input-error for="selectedContactId" class="text-xs" />
        <x-jet-input-error for="position_id" class="text-xs" />
    </div>
    <div>
        <select wire:model="para" id="perPage" class="form-select gap-1 appearance-none py-1 pr-1 border-gray-300 text-sm hover:border-gray-500 rounded-md shadow ml-2 flex justify-center focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="1" class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 disabled:text-gray-500 border-none">
                        Organisasi
                    </option>
                    <option value="2" class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 disabled:text-gray-500 border-none">
                        Para
                    </option>
        </select>
    </div>
    <div class="flex justify-center gap-2">
            @php
                $result = array();
                foreach($positions as $position){
                $result[$position->unit][] = $position;
                }
            @endphp


        {{-- source "https://davidgrzyb.com/accordion-with-alpine-js-tailwind" --}}
        <div class="w-1/2">
            <div class=" h-80 overflow-hidden overflow-y-auto text-xs font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($result as $key=>$val )
                    <div x-data="{ openedIndex: 0 }" class="">
                            <div @click="openedIndex == 1 ? openedIndex = -1 : openedIndex = 1" class="flex items-center justify-between py-1 px-4 w-full bg-teal-500 font-bold text-left border-b border-gray-200 cursor-pointer text-white hover:bg-gray-100 hover:text-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-700 focus:text-teal-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                                <div class="">{{  $key }}</div>
                                <span :class="openedIndex == 1 ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            @foreach ($val as $option )
                                    <div x-show.transition.in.duration.800ms="openedIndex == 1">
                                        <button wire:click.prevent="select({{ $option->id }})" class="py-2 px-4 w-full text-left border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-teal-700 focus:outline-none focus:ring-2 focus:bg-teal-700 focus:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-gray-800 dark:focus:bg-gray-500 dark:focus:text-white focus:hover:text-gray-700">
                                            <div>
                                                {{  $option->name }}
                                            </div>
                                            @if ($option->user_name)
                                                <div class="text-gray-500">
                                                    {{  $option->user_name }} | <span class="text-gray-600">{{  $option->user_id }}</span>
                                                </div>
                                            @endif
                                        </button>
                                    </div>
                                @endforeach
                    </div>
                        @empty
                @endforelse
            </div>
        </div>

        @include('livewire.admin.position-modal-sortable')

    </div>
</div>
