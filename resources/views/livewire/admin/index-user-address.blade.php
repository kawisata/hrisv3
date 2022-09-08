
<x-app-blank>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pegawai') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 md:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="w-full bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <x-card>
            @livewire('admin.user-address-admin')
            </x-card>
            <x-card>
                <div class="text-xs">
                    <livewire:user-address-table/>
                </div>
            </x-card>
        </div>
    </div>
</x-app-blank>
