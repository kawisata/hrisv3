<div>
       <x-slot name="header">
         <h2 class="text-xl font-semibold leading-tight text-gray-800">
           {{ __('Update Data Pekerja') }}

         </h2>
       </x-slot>

    @if (session()->has('message'))
    <div class="w-full px-4 py-3 my-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md" role="alert">
        <div class="flex">
        <div>
            <p class="text-sm">{{ session('message') }}</p>
        </div>
        </div>
    </div>
    @endif

    <x-card>
        <div class="gap-2 pl-8">
            <div>
                <form wire:submit.prevent="saveEmployee">
                    <div class="inline-flex mt-3 text-center sm:mt-0 sm:text-left">

                        <div class="flex items-end">
                                <x-input type="file" class="w-full text-sm text-gray-500 shadow-none file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-black file:text-white hover:file:bg-violet-100 "
                                wire:model="employee"
                                />
                        </div>
                        <span class="flex rounded-md shadow-sm">
                        <button class="inline-flex items-center px-2 py-2 ml-3 text-white bg-black rounded text-md hover:bg-blue-700" type="submit">import file</button>
                        </span>
                    </div>

                    <div class="mt-5 sm:mt-6">
                        <div wire:loading >Uploading...</div>
                    </div>
                </form>
            </div>
        </div>
    </x-card>

</div>
