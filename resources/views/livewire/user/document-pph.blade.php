    <div class="book">
        <div class="page">
            <div class="subpage" id='editor-container'>
                <img src="{{ asset('images/Kementerian  Keuangan Logo_bw.png') }}" class="h-32" alt="">
                <div class="text-sm mt-2">
                    Kepada. <br>
                    PT. Kereta Api Pariwisata  <br>
                    Stasiun Gondangdia Pintu Selatan Lt Dasar  <br>
                    Jl. Srikaya I, Kebon Sirih, Menteng  <br>
                    Jakarta Pusat 10340  <br>
                </div>
                <div class="w-full text-center flex justify-center">
                    <div class="border border-black w-3/4 text-2xl font-semibold">
                            SURAT PERNYATAAN
                    </div>
                </div>
                <div>
                    <p>
                    Yang bertanda tangan di bawah ini :
                    </p>
                </div>
                <div>
                    <table>
                        <tr>
                            <td class="pl-10">Nama WP / Karyawan</td><td>:</td><td>{{ $name }}</td>
                        </tr>
                        <tr>
                            <td class="pl-10">NIK / No. KTP</td><td>:</td><td>{{ $nik }}</td>
                        </tr>
                        <tr>
                            @if ($npwp === '')
                                <td class="pl-10">NPWP</td><td>:</td><td></td>
                            @else
                                <td class="pl-10">NPWP</td><td>:</td><td>{{ Illuminate\Support\Str::of($npwp)->substr(1,2) }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="pl-10">Alamat NPWP</td><td>:</td><td>{{ $address }}</td>
                        </tr>
                    </table>
                </div>
                <div class="mt-2">
                    <p>
                        Dengan ini menyatakan bahwa per tanggal 1 Januari  {{ Carbon\Carbon::now()->year }}, dengan jumlah tanggungan seperti berikut :
                    </p>
                </div>
                <div>
                    <table>
                        <tr>
                            <th class=" border border-black">No.</th>
                            <th class=" border border-black">Nama</th>
                            <th class=" border border-black">Tempat dan <br> Tanggal lahir</th>
                            <th class=" border border-black">Hubungan <br> dengan WP</th>
                            <th class=" border border-black">NPWP</th>
                            <th class=" border border-black">Keterangan</th>
                        </tr>
                        @forelse ( $userfamilies as $item )
                        <tr>
                            <td class=" border border-black">{{ $loop->iteration }}</td>
                            <td class=" border border-black">{{ $item->name }}</td>
                            <td class=" border border-black">{{ $item->birthday_place }}</td>
                            <td class=" border border-black">{{ $item->birthday }}</td>
                            <td class=" border border-black">{{ $item->npwp }}</td>
                            <td class=" border border-black"></td>
                        </tr>
                        @empty
                        <tr>
                            <td class=" border border-black"></td>
                            <td class=" border border-black"></td>
                            <td class=" border border-black"></td>
                            <td class=" border border-black"></td>
                            <td class=" border border-black"></td>
                            <td class=" border border-black"></td>
                        </tr>
                        @endforelse

                    </table>
                </div>
                <div class="mt-2">
                    <p>
                        Demikian pernyataan ini dibuat sesuai dengan keadaan yang sebenarnya, dan untuk dipergunakan sebagai dasar perhitungan Pajak Penghasilan Pasal 21 Tahun Pajak {{ Carbon\Carbon::now()->year }}.
                    </p>
                </div>
                <div class="flex flex-nowrap justify-items-between mt-5">
                    <div class="basis-7/12 text-sm">
                        <p>Status : (diisi oleh bagian pajak)</p>
                        <div>
                        <table class="text-sm">
                            <tr>
                                <td class="border-l border-t border-b border-black">
                                    <div class=" inline-flex">
                                    <div class="border border-black m-1 text-gray-400 bg-gray-400 rounded items-center">122</div>
                                    </div>
                                </td>
                                <td class="border-t border-black">TK</td>
                                <td class="border border-black">Tidak kawin</td>
                            </tr>
                            <tr>
                                <td class=" border-l border-t border-b border-black">
                                    <div class=" inline-flex">
                                    <div class="border border-black m-1 text-gray-400 bg-gray-400 rounded items-center">122</div>
                                    </div>
                                </td>
                                <td class="border-t border-b border-black">K/0</td>
                                <td class="border border-black">Kawin/0 tanggungan</td>
                            </tr>
                            <tr>
                                <td class="border-l border-t border-b border-black">
                                    <div class=" inline-flex">
                                    <div class="border border-black m-1 text-gray-400 bg-gray-400 rounded items-center">122</div>
                                    </div>
                                </td>
                                <td class="border-t border-b border-black">K/1</td>
                                <td class="border border-black">Kawin/1 tanggungan</td>
                            </tr>
                            <tr>
                                <td class="border-l border-t border-b border-black">
                                    <div class=" inline-flex">
                                    <div class="border border-black m-1 text-gray-400 bg-gray-400 rounded items-center">122</div>
                                    </div>
                                </td>
                                <td class="border-t border-b border-black">K/2</td>
                                <td class="border border-black">Kawin/2 tanggungan</td>
                            </tr>
                            <tr>
                                <td class="border-l border-t border-b border-black">
                                    <div class=" inline-flex">
                                    <div class="border border-black m-1 text-gray-400 bg-gray-400 rounded items-center">122</div>
                                    </div>
                                </td>
                                <td class="border-t border-b border-black">K/3</td>
                                <td class="border border-black">Kawin/3 tanggungan</td>
                            </tr>
                            <tr>
                                <td class="border-l border-t border-b border-black">
                                    <div class=" inline-flex">
                                    <div class="border border-black m-1 text-gray-400 bg-gray-400 rounded items-center">122</div>
                                    </div>
                                </td>
                                <td class="border-t border-b border-black">TK/1</td>
                                <td class="border border-black">Tidak Kawin/1 tanggungan</td>
                            </tr>
                            <tr>
                                <td class="border-l border-t border-b border-black">
                                    <div class=" inline-flex">
                                    <div class="border border-black m-1 text-gray-400 bg-gray-400 rounded items-center">122</div>
                                    </div>
                                </td>
                                <td class="border-t border-b border-black">TK/2</td>
                                <td class="border border-black">Tidak Kawin/2 tanggungan</td>
                            </tr>
                            <tr>
                                <td class="border-l border-t border-b border-black">
                                    <div class=" inline-flex">
                                    <div class="border border-black m-1 text-gray-400 bg-gray-400 rounded items-center">122</div>
                                    </div>
                                </td>
                                <td class="border-t border-b border-black">TK/3</td>
                                <td class="border border-black">Tidak Kawin/3 tanggungan</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <div class="basis-5/12  flex-grow"></div>
                    <div class="basis-5/12  self-start">
                        <div class="self-start">
                            <p>Jakarta, 01 JANUARI {{ Carbon\Carbon::now()->year }}</p>
                            <p>Yang membuat pernyataan,</p>
                        </div>
                        <div class="text-white">
                            <p>p</p>
                            <p>p</p>
                            <p>p</p>
                            <p>p</p>
                        </div>
                            <div class="self-end">
                            <p >{{ $name }}</p>
                            <hr class="border border-black">
                            <p>NPWP : {{ $npwp }}</p>
                        </div>
                        <div>
                            {{ url()->full() }}
                        </div>
                    </div>
                </div>
                <div class="flex text-sm">
                    <div>
                    <Table class="mt-2">
                        <tr>
                        <td class="border border-black px-2">&#10004;</td><td class="border border-black px-2">&#10006;</td><td class="border border-black px-2">Verifikasi HR Section</td><td class="border border-black">By: .......................</td>
                        </tr>
                    </Table>
                    </div>
                    <div class="flex-grow">
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function adjustZoomLevel() {
    var documentWidth = window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;

    // 1 cm = 37.795276px;
    var zoomLevel = documentWidth / (23 * 37.795276);

    // stop zooming when book fits page
    if (zoomLevel >= 1) return;

    document.querySelector(".book").style.transform = "scale(" + zoomLevel + ")";
    }

    adjustZoomLevel();

    window.addEventListener("resize", adjustZoomLevel);
</script>
