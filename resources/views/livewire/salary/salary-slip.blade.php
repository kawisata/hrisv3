<div>
    <x-jet-form-section submit="update">
        <x-slot name="title">
            {{ __('Slip Gaji Lengkap') }}
        </x-slot>

        <x-slot name="description">
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
            <!-- Pilih Bulan -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex flex-inline gap-2">
                    <x-select
                        placeholder="bulan"
                        wire:model="month"
                    >
                        <x-select.option label="Januari" value="1" />
                        <x-select.option label="Februari" value="2" />
                        <x-select.option label="Maret" value="3" />
                        <x-select.option label="April" value="4" />
                        <x-select.option label="Mei" value="5" />
                        <x-select.option label="Juni" value="6" />
                        <x-select.option label="Juli" value="7" />
                        <x-select.option label="Agustus" value="8" />
                        <x-select.option label="September" value="9" />
                        <x-select.option label="Oktober" value="10" />
                        <x-select.option label="November" value="11" />
                        <x-select.option label="Desember" value="12" />
                    </x-select>
                    <x-select
                        placeholder="Tahun"
                        :options="[2021,2022,2023,2024,2025,2026]"
                        wire:model="year"
                    />
                </div>
                <div class="inline-flex mt-3">
                    <x-toggle label="tanpa tanda tangan elektronik" wire:model="ttd" />
                </div>
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
            </x-jet-action-message>
            <div wire:loading class="text-xs text-gray-400">loading...</div>
            <x-jet-button wire:loading.attr="disabled" >
                {{ __('Download') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-jet-section-border />

    <x-jet-form-section submit="update1">
        <x-slot name="title">
            {{ __('Upah Pokok dan Tunjangan Tetap (UPTT)') }}
        </x-slot>

        <x-slot name="description">
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
            <!-- Pilih Bulan -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex flex-inline gap-2">
                    <x-select
                        placeholder="bulan"
                        wire:model="month"
                    >
                        <x-select.option label="Januari" value="1" />
                        <x-select.option label="Februari" value="2" />
                        <x-select.option label="Maret" value="3" />
                        <x-select.option label="April" value="4" />
                        <x-select.option label="Mei" value="5" />
                        <x-select.option label="Juni" value="6" />
                        <x-select.option label="Juli" value="7" />
                        <x-select.option label="Agustus" value="8" />
                        <x-select.option label="September" value="9" />
                        <x-select.option label="Oktober" value="10" />
                        <x-select.option label="November" value="11" />
                        <x-select.option label="Desember" value="12" />
                    </x-select>
                    <x-select
                        placeholder="Tahun"
                        :options="[2021,2022,2023,2024,2025,2026]"
                        wire:model="year"
                    />
                </div>
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
            </x-jet-action-message>
            <div wire:loading class="text-xs text-gray-400">loading...</div>
            <x-jet-button wire:loading.attr="disabled" >
                {{ __('Download') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-jet-section-border />

    <x-jet-form-section submit="update2">
        <x-slot name="title">
            {{ __('Tunjangan Tidak Tetap (TTT)') }}
        </x-slot>

        <x-slot name="description">
            {{-- {{ __('Update Data Anda.') }} --}}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                @if (session()->has('error2'))
                    <div class="w-full bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('error2') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Pilih Bulan -->
            <div class="col-span-6 sm:col-span-4">
                <div class="flex flex-inline gap-2">
                    <x-select
                        placeholder="bulan"
                        wire:model="month"
                    >
                        <x-select.option label="Januari" value="1" />
                        <x-select.option label="Februari" value="2" />
                        <x-select.option label="Maret" value="3" />
                        <x-select.option label="April" value="4" />
                        <x-select.option label="Mei" value="5" />
                        <x-select.option label="Juni" value="6" />
                        <x-select.option label="Juli" value="7" />
                        <x-select.option label="Agustus" value="8" />
                        <x-select.option label="September" value="9" />
                        <x-select.option label="Oktober" value="10" />
                        <x-select.option label="November" value="11" />
                        <x-select.option label="Desember" value="12" />
                    </x-select>
                    <x-select
                        placeholder="Tahun"
                        :options="[2021,2022,2023,2024,2025,2026]"
                        wire:model="year"
                    />
                </div>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
            </x-jet-action-message>
            <div wire:loading class="text-xs text-gray-400">loading...</div>
            <x-jet-button wire:loading.attr="disabled" >
                {{ __('Download') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
