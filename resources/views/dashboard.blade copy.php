<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pegawai') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 md:px-6 lg:px-8">
            <div>
            @livewire('user.employee-status')
            </div>
        </div>
    </div>
</x-app-layout>
