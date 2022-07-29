<div class="">
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Mutasi Jabatan') }}
        </h4>
    </x-slot>


    <div class="p-4 flex w-1/2">
        <div class="grow">
        <!-- Pilih NIP -->

        </div>
    </div>

    <x-jet-form-section submit="updatePosition">
        <x-slot name="title">
            {{ __('Nama Jabatan') }}
        </x-slot>

        <x-slot name="description">
            {{-- {{ __('Update your account\'s profile information and email address.') }} --}}
        </x-slot>

        <x-slot name="Jabatan">
            {{-- {{ __('Update Data Anda.') }} --}}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                @if (session()->has('error1'))
                    <div class="w-full bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('error1') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Name -->
            <!-- Alias -->
            <div class="col-span-6 md:col-span-4">
                <x-jet-label for="position_name" value="{{ __('Nama Jabatan') }}" />
                <x-jet-input id="position_name" type="text" class="mt-1 block w-full" wire:model.defer="position_name" />
                <x-jet-input-error for="position_name" class="mt-2" />
            </div>

            <div class="col-span-6 md:col-span-4">
                <div class="grow">
                <!-- Pilih NIP -->
                <x-select
                    placeholder="Nama Jabatan | ID Posisi"
                    wire:model="user_id"
                    >
                    @foreach ($users as $item)
                    <x-select.option label="{{ $item->name }} | {{ $item->id }}" value="{{ $item->id }}" />
                    @endforeach

                </x-select>
                </div>
            </div>

            <!-- Alias -->
            <div class="col-span-6 md:col-span-4">
                <x-jet-label for="alias" value="{{ __('Alias') }}" />
                <x-jet-input id="alias" type="text" class="mt-1 block w-full" wire:model.defer="alias" />
                <x-jet-input-error for="alias" class="mt-2" />
            </div>

            <!-- Alias -->
            <div class="col-span-6 md:col-span-4">
                <x-jet-label for="unit" value="{{ __('Unit') }}" />
                <x-jet-input id="unit" type="text" class="mt-1 block w-full" wire:model.defer="unit" />
                <x-jet-input-error for="unit" class="mt-2" />
            </div>

        </x-slot>
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
            </x-jet-action-message>
            <div wire:loading class="text-xs text-gray-400">loading...</div>
            <x-jet-button wire:loading.attr="disabled" >
                {{ __('Update Posisi') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

</div>
