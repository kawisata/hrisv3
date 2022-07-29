<x-jet-form-section submit="submit">
{{-- <form wire:submit.prevent="update" method="POST"> --}}
    <x-slot name="title">
        {{ __('Data Keluarga') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Panduan mengisi lihat Kartu Keluarga') }} <br>
        Istri/Suami : {{ $pasangan }} <br>
        Anak : {{ $anak }}

            @if (session()->has('message1'))
                <div class="w-full bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message1') }}</p>
                        </div>
                    </div>
                </div>
            @endif
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 md:col-span-4">
                <x-input label="Nama" placeholder="Nama" wire:model="name" />
        </div>

        <div class="col-span-6 md:col-span-4">
                <x-input label="NIK" placeholder="NIK" wire:model="nik" />
        </div>

        <div class="col-span-6 md:col-span-4">
            <x-input label="Tempat Lahir" placeholder="kota/kabupaten" wire:model="birthday_place" />
        </div>

        <div class="col-span-6 md:col-span-4">
            {{-- <x-error name="birthday_place" /> --}}

                <label class="text-sm font-medium" for="day">Tanggal Lahir</label><br>
                    <div class="flex flex-inline gap-2">
                        <x-select
                            placeholder="Tgl"
                            :options="[1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31]"
                            wire:model.defer="day"
                        />
                        <x-select
                            placeholder="bulan"
                            wire:model.defer="month"
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
                            :options="[1970,	1971,	1972,	1973,	1974,	1975,	1976,	1977,	1978,	1979,	1980,	1981,	1982,	1983,	1984,	1985,	1986,	1987,	1988,	1989,	1990,	1991,	1992,	1993,	1994,	1995,	1996,	1997,	1998,	1999,	2000,	2001,	2002,	2003,	2004,	2005,	2006,	2007,	2008,	2009,	2010,	2011,	2012,	2013,	2014,	2015,	2016,	2017,	2018,	2019,	2020,	2021,	2022]"
                            wire:model.defer="year"
                        />

                    </div>
        </div>

        <div class="col-span-6 md:col-span-4">
            <x-jet-label for="hubungan" value="{{ __('Hubungan') }}" />
            <x-select
                placeholder="Pilih Hubungan"
                :options="['Suami', 'Istri', 'Anak']"
                wire:model.defer="hubungan"
            />
        </div>

        <div class="col-span-6 md:col-span-4">
                <x-inputs.maskable
                    label="Nomor NPWP"
                    mask="##.###.###.#-###.###"
                    placeholder="00.000.000.0-000.000"
                    wire:model.defer="npwp"
                />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
        </x-jet-action-message>
        <div wire:loading class="text-xs text-gray-400">loading...</div>

        <x-jet-button wire:loading.attr="disabled" wire:click="documentPph" class="mr-3">
            {{ __('Selesai') }}
        </x-jet-button>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Simpan Data Keluarga') }}
        </x-jet-button>
    </x-slot>
{{-- </form> --}}
</x-jet-form-section>

