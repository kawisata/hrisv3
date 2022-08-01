<div>
    <div class="relative overflow-hidden w-full  bg-gray-200 pb-12 text-gray-900 border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">

        <div class="w-full visible md:invisible md:hidden">
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
        <div class="w-full mt-3 px-2 overflow-hidden rounded-lg shadow-xs md:px-4 " wire:init="loadNota">
            @isset($title)
                    <div  class=" w-full inline-flex justify-between bg-white p-2">
                        <div class=" text-2xl font-extrabold bg-white">
                            {{ $title }}
                        </div>
                        <div class="text-xs ml-auto flex justify-center bg-white py-2 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <button wire:click.prevent='$emit("openModal", "admin.position-admin-create-modal")' class="bg-blue-900 text-white rounded-full p-1 md:p-4 text-sm">
                                <span class="p-2">Tambah Jabatan</span>
                            </button>
                        </div>
                    </div>
                    <div wire:loading.class="invisible" class="w-full overflow-x-auto">
                        <div class="flex-col space-y-4 w-full">
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
                                                    <div class="flex  items-center flex-wrap gap-2 space-x-2">
                                                        <div class=" text-gray-600 text-xs md:text-sm flex gap-2 items-center">
                                                            <span class="font-bold">Alias: </span> {{ $position->alias }} |
                                                            @if ($position->group)
                                                                <span class="font-bold">Group: </span> {{ $position->group->name }} |
                                                            @endif
                                                            <span class="font-bold">Grade: </span> {{ $position->grade }} |
                                                            <span class="font-bold">Hirarki: </span> {{ $position->hierarchy }} |
                                                            <span class="font-bold">Aktif: </span> {{ $position->active }}
                                                        </div>
                                                    </div>
                                                    <div class="flex  items-center flex-wrap space-x-2">
                                                        <div class=" text-gray-600 text-xs md:text-sm flex gap-2 items-center">
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
                                                <button wire:click.prevent='$emit("openModal", "admin.position-admin-modal", {{ json_encode(["position" => $position])}})' class="bg-teal-900 text-white rounded-full p-1 md:p-4 text-sm">
                                                    <span class="p-2">Edit Jabatan</span>
                                                </button>
                                            </td>
                                                @php
                                                    $mailboxes =  Illuminate\Support\Facades\DB::table('mailboxes')->where('position_id', $position->id)->exists();
                                                    $receivers = Illuminate\Support\Facades\DB::table('receivers')->where('position_id', $position->id)->exists();
                                                    $correctors = Illuminate\Support\Facades\DB::table('correctors')->where('position_id', $position->id)->exists();
                                                @endphp
                                                <td class="px-4">
                                                    @if (!$receivers ?? !$mailboxes ?? !$correctors)
                                                            <button onclick="confirm('Yakin dihapus?') || event.stopImmediatePropagation()" wire:click.prevent="deletePosition({{ $position->id }})" class="bg-red-700 text-white rounded-full p-1 md:p-4 text-sm">
                                                                <span class="p-2">Delete</span>
                                                            </button>
                                                    @endif
                                                </td>
                                        </tr>
                                    @empty
                                        <div class="flex justify-center items-center space-x-2">
                                            <x-icon.inbox class="h-4 w-4 text-gray-400" />
                                            <span class="font-medium py-8 text-gray-400 text-sm">belum ada Posisi..</span>
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
                    <div class="flex justify-between bg-white p-2">
                        <div class=" text-2xl font-extrabold bg-white">
                            <div class="w-72 bg-gray-300 h-8 rounded-md ">
                            </div>
                        </div>
                    </div>
                    @forelse ($positions as $position )
                        <div class="w-full overflow-x-auto">
                            <div class="flex-col space-y-4 w-full">
                                <div class="w-full h-20 border-b-2 border-gray-400 bg-gray-100  mx-auto p-4">
                                    <div class="flex animate-pulse flex-row items-star h-full justify-center space-x-5">
                                        <div class="w-6 bg-gray-300 h-6 flex items-start  ">
                                            <span class="invisible">{{ $position->id }}</span>
                                        </div>
                                        <div class="w-full flex flex-col space-y-2 items-stretch">
                                            <div class="w-full bg-gray-300 h-4 rounded-md "></div>
                                            <div class="flex justify-between">
                                                <div class="w-24 md:w-72 bg-gray-300 h-4 rounded-md "></div>
                                                <div class="w-12 md:w-24 bg-gray-300 h-4 rounded-md "></div>
                                            </div>
                                            <div class="w-60 bg-gray-300 h-6 rounded-md "></div>
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
