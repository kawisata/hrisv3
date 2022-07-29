<div class="mt-4">
    <x-jet-form-section submit="update">
        <x-slot name="title">
            {{ __('Data Pendidikan') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update Data Pendidikan.') }}
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

            <div class="col-span-6 md:col-span-4">
                <x-input.group for="pendidikan" label="Pendidikan" :error="$errors->first('pendidikan')">
                    <x-input.select wire:model="pendidikan" id="pendidikan">
                            <option value="SLTA">SLTA</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                    </x-input.select>
                </x-input.group>

                <x-input.group for="jurusan" label="Jurusan" :error="$errors->first('jurusan')">
                    <x-input.text wire:model="jurusan" id="jurusan"/>
                </x-input.group>

                <x-input.group for="sekolah" label="Sekolah/Universitas" :error="$errors->first('sekolah')">
                    <x-input.text wire:model="sekolah" id="sekolah"/>
                </x-input.group>

                <x-input.group for="tgl_lulus" label="Tanggal Lulus" :error="$errors->first('tgl_lulus')">
                    <x-input.date wire:model="tgl_lulus" id="tgl_lulus" />
                </x-input.group>

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
