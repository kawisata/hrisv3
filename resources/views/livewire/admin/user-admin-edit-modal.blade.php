<div class="relative bg-gray-200 rounded-lg shadow dark:bg-teal-700">
    <!-- Modal header -->
    <div class="flex items-center justify-between p-2 bg-teal-800 border-b rounded-t dark:border-teal-600 dark:bg-teal-200">
        <h3 class="text-lg font-bold text-teal-100  dark:text-black">
            Edit Pekerja
        </h3>
        <button wire:click="close()" class="text-teal-400 bg-transparent hover:bg-teal-200 hover:text-teal-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="large-modal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>

    <div class="">
            <x-errors />
    </div>

    <form wire:submit.prevent="save()">
        <div class="w-full p-4 space-y-2">
            <div class="inline-flex space-x-2">
                <x-input label="NIP" wire:model.defer="user_id" placeholder="NIP" required />
                <x-select
                    label="Status"
                    placeholder="Status"
                    wire:model.defer="active"
                    searchable="false"
                    >
                        <x-select.option label="Aktif" value="1" />
                        <x-select.option label="Non Aktif" value="0" />
                </x-select>
            </div>
            <x-input label="Nama" wire:model.defer="name" placeholder="Nama" required />
            <x-input label="Email" wire:model.defer="email" placeholder="email" required />
            <div class="inline-flex mt-4 space-x-2">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1" type="password" name="password" wire:model.defer="password"/>
                <button
                    class="inline-flex items-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-teal-600 border border-transparent rounded-full  whitespace-nowrap hover:bg-teal-500 focus:border-teal-700 active:bg-teal-700 disabled:opacity-25"
                    wire:loading.attr="disabled" wire:target="standardPassword"
                    wire:click.prevent="standardPassword"
                >
                    <svg
                        wire:loading
                        class="w-5 h-5 mr-3 -ml-1 text-white animate-spin"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"
                        ></circle>
                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        ></path>
                    </svg>
                    Password Standard
                </button>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-4 space-x-2 border-t border-teal-400 rounded-b dark:border-gray-600">

                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-teal-600 border border-transparent rounded-full  hover:bg-teal-500 focus:border-teal-700 active:bg-teal-700 disabled:opacity-25"
                                wire:loading.attr="disabled" wire:target=""
                            >
                                <svg
                                    wire:loading
                                    class="w-5 h-5 mr-3 -ml-1 text-white animate-spin"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>
                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                    ></path>
                                </svg>
                                Simpan Pekerja
                            </button>
            <button wire:click="close()" class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-teal-700 rounded-full hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 hover:text-gray-900 focus:z-10 dark:bg-teal-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-teal-600">Batal</button>
            <div wire:loading wire:target="send" class="text-xs">
                <x-input.loading />
            </div>
        </div>

    </form>

</div>
