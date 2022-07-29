<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pekerja') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div>
            @livewire('user.employee-status')
                {{-- <x-jet-section-border /> --}}
            {{-- @livewire('user.employee-education') --}}
                {{-- <x-jet-section-border /> --}}
            {{-- @livewire('user.employee-address') --}}

            </div>
        </div>
    </div>
</x-app-layout>
