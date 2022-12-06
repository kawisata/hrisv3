				<div class="page sm:p-8 md:p-8">
				  <div>
				    <img src="{{ asset('images/logo1.png') }}" class="h-20" alt="">

				    {{-- header v2 --}}

				    <div class="px-0 py-0 mt-4 text-xs card-body">
				      <table class="table p-0 mx-0 my-0 card-body table-bordered table-sm">
				        <tr class="font-bold text-center border card-header fs-6">
				          <td colspan="6">
				            PERINCIAN PEMBAYARAN PENGHASILAN PEKERJA
				          </td>
				        </tr>
				        <tr>
				          <td>Nama</td>
				          <td>{{ $oncycle->nama }}</td>
				          <td rowspan="4"></td>
				          <td>Bulan</td>
				          <td>
				            @if ($oncycle->month == 1)
				            Januari {{ $oncycle->year }}
				            @elseif ($oncycle->month == 2)
				            Februari {{ $oncycle->year }}
				            @elseif ($oncycle->month == 3)
				            Maret {{ $oncycle->year }}
				            @elseif ($oncycle->month == 4)
				            April {{ $oncycle->year }}
				            @elseif ($oncycle->month == 5)
				            Mei {{ $oncycle->year }}
				            @elseif ($oncycle->month == 6)
				            Juni {{ $oncycle->year }}
				            @elseif ($oncycle->month == 7)
				            Juli {{ $oncycle->year }}
				            @elseif ($oncycle->month == 8)
				            Agustus {{ $oncycle->year }}
				            @elseif ($oncycle->month == 9)
				            September {{ $oncycle->year }}
				            @elseif ($oncycle->month == 10)
				            Oktober {{ $oncycle->year }}
				            @elseif ($oncycle->month == 11)
				            November {{ $oncycle->year }}
				            @elseif ($oncycle->month == 12)
				            Desember {{ $oncycle->year }}
				            @else
				            @endif
				          </td>
				          {{-- <td rowspan="4"  style="text-align: center; vertical-align: middle;"> --}}
				        <tr>
				          <td>NIPP / NIP</td>
				          <td>{{ $oncycle->user_id }}</td>
				          <td>Rekening</td>
				          <td>{{ $oncycle->bank }} - {{ $oncycle->rekening }}</td>
				        </tr>
				        <tr>
				          <td>Jabatan</td>
				          <td>{{ $oncycle->jabatan }}</td>
				          <td>NPWP</td>
				          <td>{{ $oncycle->npwp }}</td>
				        </tr>
				      </table>
				    </div>

				    <hr class="my-2">

				    {{-- rincian v2 --}}
				    <div>
				      <table class="table px-0 py-0 mt-3 text-xs table-bordered">
				        <tbody>
				          <tr>
				            <td class="p-0">
				              <div class="m-0 font-bold border card-header">Penerimaan</div>
				              <table class="table mb-0 border border-black card-body table-sm">
				                <tbody>
				                  @if ($oncycle->upah_pokok == 0)
				                  @else
				                  <tr>
				                    <td>Upah Pokok</td>
				                    <td style="text-align:right">{{ number_format($oncycle->upah_pokok, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->t_direksi == 0 || $oncycle->t_direksi == null)

				                  @else
				                  <tr>
				                    <td>Gaji Direksi</td>
				                    <td style="text-align:right">{{ number_format($oncycle->t_direksi, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->t_komisaris == NULL || $oncycle->t_komisaris == 0)


				                  @else
				                  <tr>
				                    <td>Honorarium Komisaris</td>
				                    <td style="text-align:right">{{ number_format($oncycle->t_komisaris, 0, ',', '.')}}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->t_transport_komisaris == 0 || $oncycle->t_transport_komisaris == NULL)

				                  @else
				                  <tr>
				                    <td>Tunjangan Transportasi Komisaris</td>
				                    <td style="text-align:right">{{ number_format($oncycle->t_transport_komisaris, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->pkwt == 0)
				                  @else
				                  <tr>
				                    <td>Upah Pokok</td>
				                    <td style="text-align:right">{{ number_format($oncycle->pkwt, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->t_perumahan_direksi == 0 || $oncycle->t_perumahan_direksi == null)

				                  @else
				                  <tr>
				                    <td>- Tunjangan Perumahan Direksi</td>
				                    <td style="text-align:right">{{ number_format($oncycle->t_perumahan_direksi, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->perumahan == 0)
				                  @else
				                  <tr>
				                    <td>- Tunjangan Perumahan</td>
				                    <td style="text-align:right">{{ number_format($oncycle->perumahan, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->t_admin_bank == 0)
				                  @else
				                  <tr>
				                    <td>- Tunjangan Administrasi Bank</td>
				                    <td style="text-align:right">{{ number_format($oncycle->t_admin_bank, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Jaminan Sosial Ketenagakerjaan BPJS :</td>
				                  </tr>
				                  <tr>
				                    <td>- Jaminan Hari Tua 3,7%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jht, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Jaminan Pensiun 2%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jp, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Jaminan Kecelakaan Kerja 1,27%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jkk, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Jaminan Kematian 0,3%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jk, 0, ',', '.') }}</td>
				                  </tr>

				                  @if ($oncycle->jht_ajs == 0)
				                  @else
				                  <tr>
				                    <td>Jaminan Hari Tua Jiwasraya 12,5%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jht_ajs, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Jaminan Pemeliharaan Kesehatan (JPK)</td>
				                  </tr>

				                  @if ($oncycle->jpk_kawis == 0)
				                  @else
				                  <tr>
				                    <td>- JPK BPJS 4%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk_kawis, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->jpk == 0)
				                  @else
				                  <tr>
				                    <td>- JPK BPJS 4%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->jpk_pens == 0)
				                  @else
				                  <tr>
				                    <td>- JPK Pensiunan 2%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk_pens, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->psc_kerja == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Iuran Pasca Kerja</td>
				                    <td style="text-align:right">{{ number_format($oncycle->psc_kerja, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->pajak == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Pajak</td>
				                    <td style="text-align:right">{{ number_format($oncycle->pajak, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->t_kurang_bayar == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Kekurangan Bayar</td>
				                    <td style="text-align:right">{{ number_format($oncycle->t_kurang_bayar, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($offcycle)
				                  @if ($offcycle->transport == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Transportasi</td>
				                    <td style="text-align:right">{{ number_format($offcycle->transport, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($offcycle->komunikasi == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Komunikasi</td>
				                    <td style="text-align:right">{{ number_format($offcycle->komunikasi, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($offcycle->jabatan == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Jabatan</td>
				                    <td style="text-align:right">{{ number_format($offcycle->jabatan, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($offcycle->kinerja == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Kinerja</td>
				                    <td style="text-align:right">{{ number_format($offcycle->kinerja, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($offcycle->khusus_jabatan == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Khusus Jabatan Tertentu</td>
				                    <td style="text-align:right">{{ number_format($offcycle->khusus_jabatan, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif


				                  @if ($offcycle->kemahalan == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Kemahalan</td>
				                    <td style="text-align:right">{{ number_format($offcycle->kemahalan, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($offcycle->cuti == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Cuti</td>
				                    <td style="text-align:right">{{ number_format($offcycle->cuti, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($offcycle->profesi == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Profesi</td>
				                    <td style="text-align:right">{{ number_format($offcycle->profesi, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($offcycle->pkwt == 0)
				                  @else
				                  <tr>
				                    <td>Tunjangan Tidak Tetap</td>
				                    <td style="text-align:right">{{ number_format($offcycle->pkwt, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif
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

				                  @if ($oncycle->tht == 0)
				                  @else
				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Tabungan Hari Tua Taspen :</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Pekerja 3,25%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->tht, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->jht_ajs == 0)
				                  @else
				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Jaminan Hari Tua Jiwasraya :</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Perusahaan 12,5%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jht_ajs, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Pekerja 4,75%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jht_ajs_p, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif
				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Jaminan Hari Tua BPJS Ketenagakerjaan :</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Perusahaan 3,7%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jht, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Pekerja 2%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jht_p, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Jaminan Pensiun BPJS Ketenagakerjaan :</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Perusahaan 2%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jp, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Pekerja 1%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jp_p, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Jaminan Kecelakaan Kerja BPJS 1,27%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jkk, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Jaminan Kematian BPJS 0,3%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jk, 0, ',', '.') }}</td>
				                  </tr>

				                  @if ($oncycle->jpk_kawis == 0)
				                  @else
				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Jaminan Kesehatan BPJS Kesehatan (Mandiri-PKWT) :</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Perusahaan 4%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk_kawis, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Pekerja 1%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk_p_kawis, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->jpk_uk == 0)
				                  @else
				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Jaminan Kesehatan Unit Kesehatan KAI :</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Pekerja 1%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk_uk, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->jpk == 0)
				                  @else
				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Jaminan Kesehatan BPJS Kesehatan (Perbantuan) :</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Perusahaan 4%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Pekerja 1%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk_p, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->jpk_pens == 0)
				                  @else
				                  <tr>
				                    <td colspan="2" class="font-bold card-header">Jaminan Kesehatan Pensiunan :</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Perusahaan 2%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk_pens, 0, ',', '.') }}</td>
				                  </tr>
				                  <tr>
				                    <td>- Iuran Pekerja 2%</td>
				                    <td style="text-align:right">{{ number_format($oncycle->jpk_pens_p, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->spka == 0)
				                  @else
				                  <tr>
				                    <td>Potongan Iuran SPKA</td>
				                    <td style="text-align:right">{{ number_format($oncycle->spka, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->psc_kerja == 0)
				                  @else
				                  <tr>
				                    <td>Potongan Iuran Pasca Kerja</td>
				                    <td style="text-align:right">{{ number_format($oncycle->psc_kerja, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->pens_mandiri == 0)
				                  @else
				                  <tr>
				                    <td>Potongan Tabungan Hari Tua</td>
				                    <td style="text-align:right">{{ number_format($oncycle->pens_mandiri, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif



				                  @if ($oncycle->sewa_rumah_dinas == 0)
				                  @else
				                  <tr>
				                    <td>Potongan Sewa Rumah Dinas</td>
				                    <td style="text-align:right">{{ number_format($oncycle->sewa_rumah_dinas, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->sewa_mess == 0)
				                  @else
				                  <tr>
				                    <td>Potongan Sewa Rumah Dinas</td>
				                    <td style="text-align:right">{{ number_format($oncycle->sewa_mess, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->simp_baituridho == 0)
				                  @else
				                  <tr>
				                    <td>Potongan Simpanan Baitul Ridho</td>
				                    <td style="text-align:right">{{ number_format($oncycle->simp_baituridho, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->cic_baituridho == 0)
				                  @else
				                  <tr>
				                    <td>Potongan Cicilan Baitul Ridho</td>
				                    <td style="text-align:right">{{ number_format($oncycle->cic_baituridho, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif

				                  @if ($oncycle->pajak == 0)
				                  @else
				                  <tr>
				                    <td>Potongan Pajak</td>
				                    <td style="text-align:right">{{ number_format($oncycle->pajak, 0, ',', '.') }}</td>
				                  </tr>
				                  @endif


				                  @if ($oncycle->potongan_lain == 0)
				                  @else
				                  <tr>
				                    <td>Potongan Lain-lain</td>
				                    <td style="text-align:right">{{ number_format($oncycle->potongan_lain, 0, ',', '.') }}</td>
				                  </tr>
				                </tbody>
				                @endif

				                @if ($offcycle)
				                @if ($offcycle->potongan_lain == 0)
				                @else
				                <tr>
				                  <td>Potongan Lain-lain</td>
				                  <td style="text-align:right">{{ number_format($potongan_lain, 0, ',', '.') }}</td>
				                </tr>
				                @endif

				                @if ($oncycle->admin_bank == 0)
				                @else
				                <tr>
				                  <td>Admin Bank Upah Pokok & Tunjangan Tetap</td>
				                  <td style="text-align:right">{{ number_format($oncycle->admin_bank, 0, ',', '.') }}</td>
				                </tr>
				                @endif

				                @if ($offcycle->admin_bank == 0)
				                @else
				                <tr>
				                  <td>Admin Bank Tunjangan Tidak Tetap</td>
				                  <td style="text-align:right">{{ number_format($admin_bank, 0, ',', '.') }}</td>
				                </tr>
				                @endif
				                @endif

				        </tbody>
				      </table>
				      </td>
				      </tr>
				      <tr>
				        <td class="p-0">
				          <table class="table mb-0 border border-black card-footer">
				            <tr class="font-bold">
				              <td>Total Penerimaan </td>
				              <td style="text-align:right">
				                {{ number_format($penerimaan, 0, ',', '.') }}
				              </td>
				            </tr>
				          </table>
				        </td>
				        <td></td>
				        <td class="p-0">
				          <table class="table mb-0 border border-black card-footer">
				            <tr class="font-bold">
				              <td>Total Potongan</td>
				              <td style="text-align:right">
				                {{ number_format($potongan, 0, ',', '.') }}
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
				      <table class="table px-0 py-0 mt-3 text-xs table-bordered">
				        <tr>
				          <td class="p-0">
				            <table class="table mb-0 border border-black card-footer">
				              <tr class="font-bold">
				                <td>Take Home Pay</td>
				                <td class="text-left">
				                  Rp.{{ number_format($thp, 2, ',', '.') }}
				                </td>
				                <td>
				                </td>
				              </tr>
				              <tr>
				                <td class="font-bold">Terbilang</td>
				                <td colspan="2" class="text-left font-italic">
				                  {{ Terbilang::make($thp, ' rupiah') }}
				                </td>
				              </tr>
				            </table>
				          </td>
				        </tr>
				      </table>
				    </div>
				    <div class="ml-[650px] text-xs">
				      <p>Jakarta, {{ \Carbon\Carbon::parse($oncycle->updated_at)->translatedFormat('d F Y') }}</p>
				      <p>Manager Human Capital,</p>
				      <div class="py-2">
				        {!! QrCode::size(80)->generate(url()->full()) !!}
				      </div>
				      <p class="mt-15">
				        {{ $managersdm->employee->nama }}
				      </p>
				      <p>
				        NIPP. {{ $managersdm->user_id }}
				      </p>
				    </div>

				    <div>
				      <div class="mt-4 border-t text-center text-[0.7rem]">
				        Slip Gaji ini di generate otomatis secara elektronik pada tanggal
				        {{ $oncycle->created_at->isoFormat('DD MMMM YYYY HH:mm:ss') }} dengan Aplikasi HRIS KA Pariwisata,<br> scan
				        qrcode untuk memastikan keaslian dokumen
				      </div>
				    </div>
				  </div>
				</div>
