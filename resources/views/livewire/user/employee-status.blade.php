<div class="mt-4">

    <x-jet-form-section submit="update">
        <x-slot name="title">
            {{ __('Data Pribadi') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Update Data Pegawai Anda.') }}
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
                    <x-input label="Nama" placeholder="nama" wire:model="nama" />
            </div>


            <!-- Kelamin -->
            <div class="col-span-6 md:col-span-4 ">
                <x-jet-label for="status" value="{{ __('Jenis Kelamin') }}" />
                <div class="inline-flex gap-3">
                    <x-radio id="right-label" label="Laki-Laki" wire:model.defer="kelamin" value="Laki-Laki" />
                    <x-radio id="right-label" label="Perempuan" wire:model.defer="kelamin" value="Perempuan" />
                </div>
            </div>

            <div class="col-span-6 md:col-span-4">
                    <x-input label="Tempat Lahir" placeholder="Tempat Lahir"  wire:model="tempat_lahir" />
            </div>


            {{-- <div class="col-span-6 md:col-span-4 my-0">
                <x-input.date-picker wire:model="tanggal_lahir" label="Tanggal Lahir"/>
            </div> --}}

            <div class="col-span-6 md:col-span-4 ">
                    <div class="text-sm mb-2">
                        Tangggal Lahir
                    </div>
                    <div class="flex flex-inline gap-2">
                        <select class="border-1 text-base border-gray-200 rounded-md py-2 pr-8" wire:model="day" required>
                            <option value="">Tgl</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <select class="border-1 text-base border-gray-200 rounded-md py-2 pr-8" wire:model="month" required>
                            <option value="">Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <select class="border-1 text-base border-gray-200 rounded-md py-2 pr-8" wire:model="year" required>
                            <option value="">Tahun</option>
                            <option value="1970">1970</option>
                            <option value="1971">1971</option>
                            <option value="1972">1972</option>
                            <option value="1973">1973</option>
                            <option value="1974">1974</option>
                            <option value="1975">1975</option>
                            <option value="1976">1976</option>
                            <option value="1977">1977</option>
                            <option value="1978">1978</option>
                            <option value="1979">1979</option>
                            <option value="1980">1980</option>
                            <option value="1981">1981</option>
                            <option value="1982">1982</option>
                            <option value="1983">1983</option>
                            <option value="1984">1984</option>
                            <option value="1985">1985</option>
                            <option value="1986">1986</option>
                            <option value="1987">1987</option>
                            <option value="1988">1988</option>
                            <option value="1989">1989</option>
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                        </select>
                        <x-jet-input-error for="day" class="mt-2" />
                        <x-jet-input-error for="month" class="mt-2" />
                        <x-jet-input-error for="year" class="mt-2" />

                    </div>
            </div>

            <div class="col-span-6 md:col-span-4 my-0">
                <x-input label="NIK" placeholder="NIK" wire:model="nik" />
            </div>


            <div class="col-span-6 md:col-span-4">
                <x-input label="No Kartu Keluarga" placeholder="No Kartu Keluarga" wire:model="kk" />
            </div>

            <div class="col-span-6 md:col-span-4">
                <x-input label="Nomor BPJS Ketenagakerjaan" placeholder="Nomor BPJS Ketenagakerjaan" wire:model="bpjs" />
            </div>

            <div class="col-span-6 md:col-span-4">
                <x-input label="Nomor BPJS Kesehatan" placeholder="Nomor BPJS Kesehatan" wire:model="bpjs_kes" />
            </div>

            <div class="col-span-6 md:col-span-4">
                <x-inputs.phone label="Nomor Telepon" mask="['###-####-####', '###-#####-####']" wire:model.defer="phone"/>
            </div>

            <div class="col-span-6 md:col-span-4">
                <x-select
                    label="Agama"
                    placeholder="Agama"
                    :options="['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha','Konghucu']"
                    wire:model.defer="agama"
                />
            </div>



            <div class="col-span-6 md:col-span-4">
                    <x-inputs.maskable
                        label="Nomor NPWP"
                        mask="##.###.###.#-###.###"
                        placeholder="00.000.000.0-000.000"
                        wire:model="npwp"
                    />
            </div>

            <div class="col-span-6 md:col-span-4">
                <x-jet-label for="nikah" value="{{ __('Status Pernikahan') }}" />
                <div class="inline-flex gap-3">
                    <x-radio id="right-label" label="Menikah" wire:model.defer="nikah" value="Menikah" />
                    <x-radio id="right-label" label="Belum Menikah" wire:model.defer="nikah" value="Belum Menikah" />
                    <x-radio id="right-label" label="Bercerai" wire:model.defer="nikah" value="Bercerai" />
                </div>
            </div>


            <div class="col-span-6 md:col-span-4 ">
                    <div class="text-sm mb-2">
                        Tangggal Lahir
                    </div>
                    <div class="flex flex-inline gap-2">
                        <select class="border-1 text-base border-gray-200 rounded-md py-2 pr-8" wire:model="daye" required>
                            <option value="">Tgl</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <select class="border-1 text-base border-gray-200 rounded-md py-2 pr-8" wire:model="monthe" required>
                            <option value="">Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <select class="border-1 text-base border-gray-200 rounded-md py-2 pr-8" wire:model="yeare" required>
                            <option value="">Tahun</option>
                            <option value="1970">1966</option>
                            <option value="1970">1967</option>
                            <option value="1970">1968</option>
                            <option value="1970">1969</option>
                            <option value="1970">1970</option>
                            <option value="1971">1971</option>
                            <option value="1972">1972</option>
                            <option value="1973">1973</option>
                            <option value="1974">1974</option>
                            <option value="1975">1975</option>
                            <option value="1976">1976</option>
                            <option value="1977">1977</option>
                            <option value="1978">1978</option>
                            <option value="1979">1979</option>
                            <option value="1980">1980</option>
                            <option value="1981">1981</option>
                            <option value="1982">1982</option>
                            <option value="1983">1983</option>
                            <option value="1984">1984</option>
                            <option value="1985">1985</option>
                            <option value="1986">1986</option>
                            <option value="1987">1987</option>
                            <option value="1988">1988</option>
                            <option value="1989">1989</option>
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                        </select>
                        <x-jet-input-error for="daye" class="mt-2" />
                        <x-jet-input-error for="monthe" class="mt-2" />
                        <x-jet-input-error for="yeare" class="mt-2" />

                    </div>
            </div>


            {{-- <div class="col-span-6 md:col-span-4">
                <x-input.group for="tgl_nikah" label="Tanggal Menikah" :error="$errors->first('tgl_nikah')">
                    <x-input.date wire:model="tgl_nikah" id="tgl_lahir" />
                </x-input.group>
            </div> --}}


        </x-slot>

        <x-slot name="actions">
            <div class="flex justify-between">
            @if (session()->has('message'))
                    <div class=" bg-teal-100 border-l-4 border-teal-500 rounded-b text-teal-900 p-2 shadow-md mr-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
            @endif
            <div wire:loading class="text-xs text-gray-400 ">loading...</div>
            <x-jet-button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
            </div>

        </x-slot>
    </x-jet-form-section>
<div>
