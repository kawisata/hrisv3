<div class="mt-4">
    <x-jet-form-section submit="update">
        <x-slot name="title">
            {{ __('Data Alamat') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update Data Alamat.') }}
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
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 md:col-span-4">
                @if (session()->has('error'))
                    <div class="w-full bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>


            <!-- Alamat -->
            <div class="col-span-6 md:col-span-4">
                <x-textarea label="Alamat Lengkap saat ini" placeholder="alamat lengkap saat ini" wire:model.defer="address1" />
            </div>

            <div class="col-span-6 md:w-full md:flex md:flex-wrap gap-2">
                <x-select
                    label="Provinsi"
                    placeholder="Pilih Provinsi"
                    wire:model="selectedProvince"
                    required
                >
                    @foreach($provinces as $province)
                        <x-select.option label="{{ $province->name }}" value="{{$province->id}}" />
                    @endforeach
                </x-select>

                @if (!is_null($selectedProvince))
                    <x-select
                        label="Kota/Kabupaten"
                        placeholder="Pilih Kota/Kabupaten"
                        wire:model="selectedRegency"
                        required
                    >
                        @foreach($regencies as $regency)
                            <x-select.option label="{{ $regency->name }}" value="{{$regency->id}}" />
                        @endforeach
                    </x-select>
                @endif

                @if (!is_null($selectedRegency))
                    <x-select
                        label="Kecamatan"
                        placeholder="Pilih Kecamatan"
                        wire:model="selectedDistrict"
                    >
                        @foreach($districts as $district)
                            <x-select.option label="{{ $district->name }}" value="{{$district->id}}" />
                        @endforeach
                    </x-select>
                @endif

                @if (!is_null($selectedDistrict))
                    <x-select
                        label="Kelurahan/Desa"
                        placeholder="Pilih Kelurahan/Desa"
                        wire:model="selectedVillage"
                    >
                        @foreach($villages as $village)
                            <x-select.option label="{{ $village->name }}" value="{{$village->id}}" />
                        @endforeach
                    </x-select>
                @endif
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
            </x-jet-action-message>
            <div wire:loading class="text-xs text-gray-400">loading...</div>
            <x-jet-button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
