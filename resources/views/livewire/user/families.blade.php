<x-app-blank>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Keluarga') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 md:px-6 lg:px-8">
            <div>
            @livewire('user.user-families')
            </div>
        </div>
    </div>

</x-app-blank>
