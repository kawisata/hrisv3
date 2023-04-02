    <div class="p-5 page sm:p-16 md:p-16">
        <div>
            <img src="{{ asset('images/logo1.png') }}" class="h-24" alt="">

{{-- header v2 --}}

            <div class="px-0 py-0 mt-4 text-xs card-body">
                <table class="table p-0 mx-0 my-0 card-body table-bordered table-sm">
                    <tr class="font-bold text-center border card-header fs-6">
                        <td colspan="6" >
                            PERINCIAN PEMBAYARAN PENGHASILAN PEKERJA
                        </td>
                    </tr>
                    <tr class="font-bold text-center border card-header fs-6">
                        <td colspan="6" >
                            Tunjangan Tidak Tetap
                        </td>
                    </tr>
                    <tr>
                        {{-- <td>Nama</td><td>{{ Illuminate\Support\Str::of($offcycle->nama)->substr(4) }}</td> --}}
                        <td>Nama</td><td>{{ $offcycle->nama }}</td>
                        <td rowspan="4"></td>
                        <td>Bulan</td>
                        <td>
                            @if ($offcycle->month == 1)
                                Januari {{ $offcycle->year }}
                            @elseif ($offcycle->month == 2)
                                Februari {{ $offcycle->year }}
                            @elseif ($offcycle->month == 3)
                                Maret {{ $offcycle->year }}
                            @elseif ($offcycle->month == 4)
                                April {{ $offcycle->year }}
                            @elseif ($offcycle->month == 5)
                                Mei {{ $offcycle->year }}
                            @elseif ($offcycle->month == 6)
                                Juni {{ $offcycle->year }}
                            @elseif ($offcycle->month == 7)
                                Juli {{ $offcycle->year }}
                            @elseif ($offcycle->month == 8)
                                Agustus {{ $offcycle->year }}
                            @elseif ($offcycle->month == 9)
                                September {{ $offcycle->year }}
                            @elseif ($offcycle->month == 10)
                                Oktober {{ $offcycle->year }}
                            @elseif ($offcycle->month == 11)
                                November {{ $offcycle->year }}
                            @elseif ($offcycle->month == 12)
                                Desember {{ $offcycle->year }}
                            @else

                            @endif
                        </td>
                        {{-- <td rowspan="4"  style="text-align: center; vertical-align: middle;"> --}}
                    <tr>
                        <td>NIPP / NIP</td><td>{{$offcycle->user_id}}</td>
                        <td>Rekening</td><td>{{$offcycle->bank}} - {{$offcycle->rekening}}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td><td>{{$offcycle->user->position->name ?? ''}}</td>
                        <td>NPWP</td><td>{{$offcycle->npwp}}</td>
                    </tr>
                </table>
            </div>

            <hr class="my-2 ">

            {{-- rincian v2 --}}
            <div>
                <table class="table px-0 py-0 mt-3 text-xs table-bordered">
                    <tbody>
                        <tr>
                            <td class="p-0">
                                <div class="m-0 font-bold border card-header">Penerimaan</div>
                                <table class="table mb-0 border border-black card-body table-sm">
                                    <tbody>
                                            @if($offcycle->transport == 0)
                                            @else
                                            <tr><td>Tunjangan Transportasi</td><td style="text-align:right">{{number_format($offcycle->transport, 0, ',', '.')}}</td></tr>
                                            @endif

                                            @if($offcycle->komunikasi == 0)
                                            @else
                                            <tr><td>Tunjangan Komunikasi</td><td style="text-align:right">{{number_format($offcycle->komunikasi, 0, ',', '.')}}</td></tr>
                                            @endif

                                            @if($offcycle->khusus_jabatan == 0)
                                            @else
                                            <tr>
                                              <td>Tunjangan Khusus</td>
                                              <td style="text-align:right">{{number_format($offcycle->khusus_jabatan, 0, ',', '.')}}</td>
                                            </tr>

                                            @endif

                                            @if($offcycle->kinerja == 0)
                                            @else
                                            <tr><td>Tunjangan Kinerja</td><td style="text-align:right">{{number_format($offcycle->kinerja, 0, ',', '.')}}</td></tr>
                                            @endif

                                            @if($offcycle->kemahalan == 0)
                                            @else
                                            <tr><td>Tunjangan Kemahalan</td><td style="text-align:right">{{number_format($offcycle->kemahalan, 0, ',', '.')}}</td></tr>
                                            @endif

                                            @if($offcycle->cuti == 0)
                                            @else
                                            <tr><td>Tunjangan Cuti</td><td style="text-align:right">{{number_format($offcycle->cuti, 0, ',', '.')}}</td></tr>
                                            @endif

                                            @if($offcycle->profesi == 0)
                                            @else
                                            <tr><td>Tunjangan Profesi</td><td style="text-align:right">{{number_format($offcycle->profesi, 0, ',', '.')}}</td></tr>
                                            @endif

                                            @if($offcycle->pkwt == 0)
                                            @else
                                            <tr><td>Tunjangan Tidak Tetap</td><td style="text-align:right">{{number_format($offcycle->pkwt, 0, ',', '.')}}</td></tr>
                                            @endif

                                    </tbody>
                                </table>
                            </td>
                            <td>

                            </td>
                            <td class="p-0">
                                <div class="font-bold card-header">Potongan</div>
                                <table class="table mb-0 border border-black card-body table-sm">
                                    <tbody>
                                        @if($offcycle->potongan_lain == 0)
                                        @else
                                        <tr><td>Potongan Lain-lain</td><td style="text-align:right">{{number_format($potongan_lain, 0, ',', '.')}}</td></tr>
                                        @endif

                                        @if($offcycle->admin_bank == 0)
                                        @else
                                        <tr><td>Admin Bank</td><td style="text-align:right">{{number_format($admin_bank, 0, ',', '.')}}</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-0">
                                <table class="table mb-0 border border-black card-footer">
                                    <tr class="font-bold ">
                                        <td >Total Penerimaan </td>
                                        <td style="text-align:right" >
                                        {{number_format($offcycle->t_penerimaan, 0, ',', '.')}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td></td>
                            <td  class="p-0">
                                <table class="table mb-0 border border-black card-footer">
                                    <tr class="font-bold ">
                                        <td >Total Potongan</td>
                                        <td style="text-align:right"  >
                                        {{number_format($t_potongan, 0, ',', '.')}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- thp --}}
            <div class="w-full">
                <table class="table px-0 py-0 mt-3 text-base table-bordered">
                    <tr>
                        <td class="p-0">
                            <table class="table mb-0 border border-black card-footer">
                                <tr class="font-bold ">
                                    <td >Take Home Pay</td>
                                    <td class="text-left">
                                    Rp.{{number_format($offcycle->thp, 2, ',', '.')}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr >
                                    <td class="font-bold " >Terbilang</td>
                                    <td colspan="2" class="text-left font-italic">
                                    {{ Terbilang::make($offcycle->thp, ' rupiah')}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class=" ml-[650px]">
                <p>Jakarta, {{ \Carbon\Carbon::parse($offcycle->updated_at)->translatedFormat('d F Y') }}</p>
                <p>Manager Human Capital,</p>
                <div class="py-2">
                    {!! QrCode::size(80)
                        ->generate(url()->full())
                    !!}
                </div>
                <p>
                    {{ $managersdm->employee->nama }}
                </p>
                <p>
                    NIPP. {{ $managersdm->user_id }}
                </p>
            </div>
            <div>
                <div class=" text-center border-t text-[0.7rem] mt-4" >
                    Slip Gaji ini di generate otomatis secara elektronik pada tanggal {{ $offcycle->created_at->isoFormat('DD MMMM YYYY HH:mm:ss') }} dengan Aplikasi HRIS KA Pariwisata,<br> scan qrcode untuk memastikan keaslian dokumen
                </div>
            </div>
        </div>
    </div>
