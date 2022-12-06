<div>
    <div class="relative w-full pb-12 overflow-hidden text-gray-900 bg-gray-200 border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">

        <div class="visible w-full md:invisible md:hidden">
            <div class="py-2 pl-2 md:pl-[265px] left-0 right-0 w-full flex justify-between overflow-hidden shadow-xs bg-white">
                <div class="flex justify-start flex-1 md:mr-32">
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
                            class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-full dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                            type="text"
                            placeholder="cari perihal Nota"
                            aria-label="Search"
                            wire:model="search"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full px-2 mt-3 overflow-hidden rounded-lg shadow-xs md:px-4 " wire:init="loadNota">
            @isset($title)
                    <div  class="inline-flex justify-between w-full p-2 bg-white ">
                        <div class="text-2xl font-extrabold bg-white ">
                            {{ $title }}
                        </div>
                        <div class="flex justify-center py-2 ml-auto text-xs bg-white focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <button wire:click.prevent='$emit("openModal", "admin.position-admin-create-modal")' class="p-1 text-sm text-white bg-blue-900 rounded-full md:p-4">
                                <span class="p-2">Tambah Jabatan</span>
                            </button>
                        </div>
                    </div>
                    <div wire:loading.class="invisible" class="w-full overflow-x-auto">
                        <div class="flex-col w-full space-y-4">
                            <table class="w-full ">
                                <tbody>
                                    @forelse ($positions as $position)
                                        <tr @class([
                                                    'hover:shadow-lg',
                                                    'hover:bg-gray-200',
                                                    'text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500'
                                                ])
                                            >
                                            <td class="px-4 ">
                                                <div>
                                                    <div class="flex justify-between">
                                                        <div class="dark:text-gray-100">
                                                            <span class="text-xs font-bold md:text-sm">{{ $position->name }}
                                                            @if ($position->user)
                                                                 | {{ $position->user->name }} | {{ $position->user_id }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-wrap items-center gap-2 space-x-2">
                                                        <div class="flex items-center gap-2 text-xs text-gray-600  md:text-sm">
                                                            <span class="font-bold">Alias: </span> {{ $position->alias }} |
                                                            @if ($position->group)
                                                                <span class="font-bold">Group: </span> {{ $position->group->name }} |
                                                            @endif
                                                            <span class="font-bold">Grade: </span> {{ $position->grade }} |
                                                            <span class="font-bold">Hirarki: </span> {{ $position->hierarchy }} |
                                                            <span class="font-bold">Aktif: </span> {{ $position->active }}
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-wrap items-center space-x-2">
                                                        <div class="flex items-center gap-2 text-xs text-gray-600  md:text-sm">
                                                            <span class="font-bold">Unit: </span> {{ $position->unit }} |
                                                            <span class="font-bold">Head Unit: </span> {{ $position->head_unit }} |
                                                            <span class="font-bold">Asisten Untuk:</span>
                                                            @if ($position->assistant)
                                                                {{ $position->assistant->name }} | {{ $position->assistant_id }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-4">
                                                <button wire:click.prevent='$emit("openModal", "admin.position-admin-modal", {{ json_encode(["position" => $position])}})' class="p-1 text-sm text-white bg-teal-900 rounded-full md:p-4">
                                                    <span class="p-2">Edit Jabatan</span>
                                                </button>
                                            </td>
                                                <td class="px-4">
                                                </td>
                                        </tr>
                                    @empty
                                        <div class="flex items-center justify-center space-x-2">
                                            <x-icon.inbox class="w-4 h-4 text-gray-400" />
                                            <span class="py-8 text-sm font-medium text-gray-400">belum ada Posisi..</span>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>


                            <div class="focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                {{ $positions->links('components.tailwind-pagination') }}
                            </div>
                        </div>
                    </div>
            @else
                <div wire:loading class="w-full">
                    <div class="flex justify-between p-2 bg-white">
                        <div class="text-2xl font-extrabold bg-white ">
                            <div class="h-8 bg-gray-300 rounded-md w-72 ">
                            </div>
                        </div>
                    </div>
                    @forelse ($positions as $position )
                        <div class="w-full overflow-x-auto">
                            <div class="flex-col w-full space-y-4">
                                <div class="w-full h-20 p-4 mx-auto bg-gray-100 border-b-2 border-gray-400">
                                    <div class="flex flex-row justify-center h-full space-x-5 animate-pulse items-star">
                                        <div class="flex items-start w-6 h-6 bg-gray-300 ">
                                            <span class="invisible">{{ $position->id }}</span>
                                        </div>
                                        <div class="flex flex-col items-stretch w-full space-y-2">
                                            <div class="w-full h-4 bg-gray-300 rounded-md "></div>
                                            <div class="flex justify-between">
                                                <div class="w-24 h-4 bg-gray-300 rounded-md md:w-72 "></div>
                                                <div class="w-12 h-4 bg-gray-300 rounded-md md:w-24 "></div>
                                            </div>
                                            <div class="h-6 bg-gray-300 rounded-md w-60 "></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            @endisset

        </div>
    </div>
</div>
