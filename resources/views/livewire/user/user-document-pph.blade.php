    <div class="page md:p-16 md:p-16 p-5">
        <div class="subpage" id='editor-container'>
            <img src="{{ asset('images/Kementerian  Keuangan Logo_bw.png') }}" class="h-32" alt="">
            <div class="md:text-xs text-[0.5rem] mt-2">
                Kepada. <br>
                PT. Kereta Api Pariwisata  <br>
                Stasiun Gondangdia Pintu Selatan Lt Dasar  <br>
                Jl. Srikaya I, Kebon Sirih, Menteng  <br>
                Jakarta Pusat 10340  <br>
            </div>
            <div class="w-full text-center flex justify-center mt-4">
                <div class="border border-black w-3/4 text-1xl font-semibold">
                        SURAT PERNYATAAN
                </div>
            </div>
            <div class="md:text-xs text-[0.5rem]">
                <p>
                Yang bertanda tangan di bawah ini :
                </p>
            </div>
            <div class="align-top md:text-xs text-[0.5rem]">
                <table class="inline-table align-top">
                    <tr class="align-top">
                        <td class="pl-6 whitespace-nowrap align-top">Nama WP / Karyawan</td>
                        <td class="align-top px-2">:</td>
                        <td class="align-top">{{ Illuminate\Support\Str::upper($employee->name) }}</td>
                    </tr>
                    <tr class=" align-top">
                        <td class="pl-6 align-top">NIK / No. KTP</td>
                        <td class="align-top px-2">:</td>
                        <td>{{ $employee->nik }}</td>
                    </tr>
                    <tr class=" align-top">
                        @if ($employee->npwp === null)
                            <td class="pl-6 align-top">NPWP</td>
                            <td class="align-top px-2">:</td>
                            <td></td>
                        @else
                            <td class="pl-6 align-top">NPWP</td>
                            <td class="align-top px-2">:</td>
                            <td>
                                {{ Illuminate\Support\Str::of($employee->npwp)->substr(0,2) }}.
                                {{ Illuminate\Support\Str::of($employee->npwp)->substr(2,3) }}.
                                {{ Illuminate\Support\Str::of($employee->npwp)->substr(5,3) }}.
                                {{ Illuminate\Support\Str::of($employee->npwp)->substr(8,1) }}-
                                {{ Illuminate\Support\Str::of($employee->npwp)->substr(9,3) }}.
                                {{ Illuminate\Support\Str::of($employee->npwp)->substr(12,3) }}
                            </td>
                        @endif
                    </tr>
                    <tr class=" align-top">
                        <td class="pl-6 align-top">Alamat NPWP</td>
                        <td class="align-top px-2">:</td>
                        <td>{{ Illuminate\Support\Str::upper($useraddress->address) }}</td>
                    </tr>
                    <tr class=" align-top">
                        <td class="pl-6 align-top"></td>
                        <td class="align-top px-2"></td>
                        <td>
                            KEL./DESA : {{ Illuminate\Support\Str::upper($useraddress->village_name) }}
                            - KEC. : {{ Illuminate\Support\Str::upper($useraddress->district_name) }}
                        </td>
                    </tr>
                    <tr class=" align-top">
                        <td class="pl-6 align-top"></td>
                        <td class="align-top px-2"></td>
                        <td>
                            KOTA/KAB. : {{ Illuminate\Support\Str::upper($useraddress->regency_name) }}
                            - PROVINSI : {{ Illuminate\Support\Str::upper($useraddress->province_name) }}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="mt-2 w-full text-justify md:text-xs text-[0.5rem]">
                    Dengan ini menyatakan bahwa per tanggal 1 Januari  {{ Carbon\Carbon::now()->year }}, dengan jumlah tanggungan seperti berikut :
            </div>
            <div>
                <table class="w-full md:text-xs text-[0.5rem]">
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
                        <td class=" border border-black">{{ Illuminate\Support\Str::upper($item->name) }}</td>
                        <td class=" border border-black">{{ Illuminate\Support\Str::upper($item->birthday_place) }}, {{ $item->birthday }}</td>
                        <td class=" border border-black">{{ Illuminate\Support\Str::upper($item->hubungan) }}</td>
                        @if ($item->npwp === null)
                        <td class=" border border-black"></td>
                        @else
                            <td class=" border border-black">
                                {{ Illuminate\Support\Str::of($item->npwp)->substr(0,2) }}.
                                {{ Illuminate\Support\Str::of($item->npwp)->substr(2,3) }}.
                                {{ Illuminate\Support\Str::of($item->npwp)->substr(5,3) }}.
                                {{ Illuminate\Support\Str::of($item->npwp)->substr(8,1) }}-
                                {{ Illuminate\Support\Str::of($item->npwp)->substr(9,3) }}.
                                {{ Illuminate\Support\Str::of($item->npwp)->substr(12,3) }}
                            </td>
                        @endif
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
            <div class="mt-2 w-full text-justify md:text-xs text-[0.5rem]">
                    Demikian pernyataan ini dibuat sesuai dengan keadaan yang sebenarnya, dan untuk dipergunakan sebagai dasar perhitungan Pajak Penghasilan Pasal 21 Tahun Pajak {{ Carbon\Carbon::now()->year }}.
            </div>
            <div class="md:text-xs text-[0.5rem] flex flex-nowrap justify-items-between mt-5">
                <div class="basis-7/12">
                    <p>Status : (diisi oleh bagian pajak)</p>
                    <div>
                    <table>
                        <tr>
                            <td class="border border-black whitespace-nowrap">&#10063; TK</td>
                            <td class="border border-black px-2 whitespace-nowrap">Tidak kawin</td>
                        </tr>
                        <tr>
                            <td class="border border-b border-black pr-2 whitespace-nowrap">&#10063; K/0</td>
                            <td class="border border-black px-2 whitespace-nowrap">Kawin/0 tanggungan</td>
                        </tr>
                        <tr>
                            <td class="border border-b border-black pr-2 whitespace-nowrap">&#10063; K/1</td>
                            <td class="border border-black px-2 whitespace-nowrap">Kawin/1 tanggungan</td>
                        </tr>
                        <tr>
                            <td class="border border-b border-black pr-2 whitespace-nowrap">&#10063; K/2</td>
                            <td class="border border-black px-2 whitespace-nowrap">Kawin/2 tanggungan</td>
                        </tr>
                        <tr>
                            <td class="border border-b border-black pr-2 whitespace-nowrap">&#10063; K/3</td>
                            <td class="border border-black px-2 whitespace-nowrap">Kawin/3 tanggungan</td>
                        </tr>
                        <tr>
                            <td class="border border-b border-black pr-2 whitespace-nowrap">&#10063; TK/1</td>
                            <td class="border border-black px-2 whitespace-nowrap">Tidak Kawin/1 tanggungan</td>
                        </tr>
                        <tr>
                            <td class="border border-b border-black pr-2 whitespace-nowrap">&#10063; TK/2</td>
                            <td class="border border-black px-2 whitespace-nowrap">Tidak Kawin/2 tanggungan</td>
                        </tr>
                        <tr>
                            <td class="border border-b border-black pr-2 whitespace-nowrap">&#10063; TK/3</td>
                            <td class="border border-black px-2 whitespace-nowrap">Tidak Kawin/3 tanggungan</td>
                        </tr>
                    </table>
                    </div>
                </div>
                <div class="basis-5/12  flex-grow"></div>
                <div class="basis-7/12  self-start">
                    <div class="self-start">
                        <p>Jakarta, 01 JANUARI {{ Carbon\Carbon::now()->year }}</p>
                        <p>Yang membuat pernyataan,</p>
                    </div>
                    <div class="py-2">
                        {!! QrCode::size(80)
                            ->generate(url()->full())
                        !!}
                    </div>
                        <div class="self-end">
                        <p >{{ Illuminate\Support\Str::upper($employee->name) }}</p>
                        <hr class="border border-black">
                        <p>NPWP :
                            {{ Illuminate\Support\Str::of($employee->npwp)->substr(0,2) }}.
                            {{ Illuminate\Support\Str::of($employee->npwp)->substr(2,3) }}.
                            {{ Illuminate\Support\Str::of($employee->npwp)->substr(5,3) }}.
                            {{ Illuminate\Support\Str::of($employee->npwp)->substr(8,1) }}-
                            {{ Illuminate\Support\Str::of($employee->npwp)->substr(9,3) }}.
                            {{ Illuminate\Support\Str::of($employee->npwp)->substr(12,3) }}                            </p>
                    </div>
                </div>
            </div>
            <div class="flex md:text-xs text-[0.5rem]">
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
        <div id="btnPrint" title="Print…" class="btn-round btn-print noselect">
            <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet">
            <g>
                <path
                d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"
                ></path>
            </g>
            </svg>
        </div>
        <a href="{{ URL::previous() }}" id="btnDownload" title="Print…" class="btn-round btn-download noselect">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
        </a>

    </div>
    <script type="text/javascript" src="{{ asset('js/ua-parser.min.js') }}"></script>
    <script type="text/javascript">
        (function () {
            var result = new UAParser().getResult();
            if (result.browser.name === "IE") {
            // Unsupported browsers
            document.getElementById("cv").style.display = "none";
            document.getElementById("error").style.display = "block";
            }
            if (result.browser.name !== "Safari" && !result.device.type) {
            // Problematic print
            document.getElementById("btnPrint").style.display = "block";
            }
            document.getElementById("btnPrint").onclick = function () {
            window.print();
            };
        })();
    </script>
    {{-- <script>
        function adjustZoomLevel() {
        var documentWidth = window.innerWidth
            || document.documentElement.clientWidth
            || document.body.clientWidth;

        // 1 cm = 37.795276px;
        var zoomLevel = documentWidth / (23 * 37.795276);

        // stop zooming when book fits page
        if (zoomLevel >= 1) return;

        document.querySelector(".page").style.transform = "scale(" + zoomLevel + ")";
        }

        adjustZoomLevel();

        window.addEventListener("resize", adjustZoomLevel);
    </script> --}}
