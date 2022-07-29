<div>
            <!-- modal div -->
        <div class="" x-data="{ open: false }">

        <!-- Button (blue), duh! -->
        <button class=" text-xs inline-flex justify-center px-2 py-2 text-white bg-blue-500 rounded hover:bg-blue-700" @click="open = true">
            <div class="flex items-end">
                Upload Pegawai
            </div>
            </button>

        {{-- <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline" @click="open = true">Open Modal</button> --}}

        <!-- Dialog (full screen) -->
        <div class="absolute z-50 top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >

            <!-- A basic modal dialog with title, body and one button to close -->
            <div class="h-auto p-4 mx-2 text-left bg-white  rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0 md:w-6/12" @click.away="open = false">
                <form wire:submit.prevent="import">
                    <div class="mt-3 text-center md:mt-0 md:text-left">
                        <div class="mt-2">
                        <div class="flex items-end">
                                <x-input type="file" class="w-full text-sm text-gray-500  shadow-none
                                file:py-2 file:px-4
                                file:rounded file:border-0
                                file:text-sm
                                file:bg-blue-500 file:text-violet-700
                                hover:file:bg-violet-100
                                "
                                wire:model="importFile"
                                />


                        </div>
                        </div>
                    </div>

                    <!-- One big close button.  --->
                    <div class="mt-5 md:mt-6">
                        <span class="flex  rounded-md shadow-sm">
                        <button @click="open = false" class=" text-xs inline-flex justify-center px-2 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                            Close
                        </button>
                        <button class="text-xs ml-3 inline-flex justify-center px-2 py-2 text-white bg-blue-500 rounded hover:bg-blue-700" type="submit">import file</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        </div>
</div>
