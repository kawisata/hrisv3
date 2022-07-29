				<div class="page p-5 sm:p-16 md:p-16">
					<div>
						<img src="{{ asset('images/logo1.png') }}"
											class="h-24"
											alt="">

						{{-- header v2 --}}

						<div class="card-body mt-4 py-0 px-0 text-sm">
							<table class="card-body table-bordered table-sm mx-0 my-0 table p-0">
								<tr class="card-header fs-6 border text-center font-bold">
									<td colspan="6">
										PERINCIAN PEMBAYARAN PENGHASILAN PEKERJA
									</td>
								</tr>
								<tr class="card-header fs-6 border text-center font-bold">
									<td colspan="6">
										Upah Pokok Dan Tunjangan Tetap
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
							<table class="table-bordered mt-3 table py-0 px-0 text-sm">
								<tbody>
									<tr>
										<td class="p-0">
											<div class="card-header m-0 border font-bold">Penerimaan</div>
											<table class="card-body table-sm mb-0 table border border-black">
												<tbody>
													@if ($oncycle->upah_pokok == 0)
													@else
														<tr>
															<td>Upah Pokok</td>
															<td style="text-align:right">{{ number_format($oncycle->upah_pokok, 0, ',', '.') }}</td>
														</tr>
													@endif

													@if ($oncycle->t_direksi == 0)
													@else
														<tr>
															<td>Tunjangan PLT Direksi</td>
															<td style="text-align:right">{{ number_format($oncycle->t_direksi, 0, ',', '.') }}</td>
														</tr>
													@endif

													@if ($oncycle->pkwt == 0)
													@else
														<tr>
															<td>Upah Pokok</td>
															<td style="text-align:right">{{ number_format($oncycle->pkwt, 0, ',', '.') }}</td>
														</tr>
													@endif

													@if ($oncycle->t_perumahan_direksi == 0)
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
														<td colspan="2"
																		class="card-header font-bold">Jaminan Sosial Ketenagakerjaan BPJS :</td>
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
														<td colspan="2"
																		class="card-header font-bold">Jaminan Pemeliharaan Kesehatan (JPK)</td>
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
												</tbody>
											</table>
										</td>
										<td>

										</td>
										<td class="p-0">
											<div class="card-header font-bold">Potongan</div>
											<table class="card-body table-sm mb-0 table border border-black">
												<tbody>
													@if ($oncycle->tht == 0)
													@else
														<tr>
															<td colspan="2"
																			class="card-header font-bold">Tabungan Hari Tua Taspen :</td>
														</tr>
														<tr>
															<td>- Iuran Pekerja 3,25%</td>
															<td style="text-align:right">{{ number_format($oncycle->tht, 0, ',', '.') }}</td>
														</tr>
													@endif

													@if ($oncycle->jht_ajs == 0)
													@else
														<tr>
															<td colspan="2"
																			class="card-header font-bold">Jaminan Hari Tua Jiwasraya :</td>
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
														<td colspan="2"
																		class="card-header font-bold">Jaminan Hari Tua BPJS Ketenagakerjaan :</td>
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
														<td colspan="2"
																		class="card-header font-bold">Jaminan Pensiun BPJS Ketenagakerjaan :</td>
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
															<td colspan="2"
																			class="card-header font-bold">Jaminan Kesehatan BPJS Kesehatan (Mandiri-PKWT) :</td>
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
															<td colspan="2"
																			class="card-header font-bold">Jaminan Kesehatan Unit Kesehatan KAI :</td>
														</tr>
														<tr>
															<td>- Iuran Pekerja 1%</td>
															<td style="text-align:right">{{ number_format($oncycle->jpk_uk, 0, ',', '.') }}</td>
														</tr>
													@endif

													@if ($oncycle->jpk == 0)
													@else
														<tr>
															<td colspan="2"
																			class="card-header font-bold">Jaminan Kesehatan BPJS Kesehatan (Perbantuan) :</td>
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
															<td colspan="2"
																			class="card-header font-bold">Jaminan Kesehatan Pensiunan :</td>
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

													@if ($oncycle->admin_bank == 0)
													@else
														<tr>
															<td>Admin Bank</td>
															<td style="text-align:right">{{ number_format($oncycle->admin_bank, 0, ',', '.') }}</td>
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
								</tbody>
							</table>
							</td>
							</tr>
							<tr>
								<td class="p-0">
									<table class="card-footer mb-0 table border border-black">
										<tr class="font-bold">
											<td>Total Penerimaan </td>
											<td style="text-align:right">
												{{ number_format($oncycle->t_penerimaan, 0, ',', '.') }}
											</td>
										</tr>
									</table>
								</td>
								<td></td>
								<td class="p-0">
									<table class="card-footer mb-0 table border border-black">
										<tr class="font-bold">
											<td>Total Potongan</td>
											<td style="text-align:right">
												{{ number_format($oncycle->t_potongan, 0, ',', '.') }}
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
							<table class="table-bordered mt-3 table py-0 px-0 text-base">
								<tr>
									<td class="p-0">
										<table class="card-footer mb-0 table border border-black">
											<tr class="font-bold">
												<td>Take Home Pay</td>
												<td class="text-left">
													Rp.{{ number_format($oncycle->thp, 2, ',', '.') }}
												</td>
												<td>
												</td>
											</tr>
											<tr>
												<td class="font-bold">Terbilang</td>
												<td colspan="2"
																class="font-italic text-left">
													{{ Terbilang::make($oncycle->thp, ' rupiah') }}
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
						<div class="ml-[650px]">
							<p>Jakarta, {{ \Carbon\Carbon::parse($oncycle->updated_at)->translatedFormat('d F Y') }}</p>
							<p>Manager Human Capital,</p>
							<div class="py-2">
								{!! QrCode::size(80)->generate(url()->full()) !!}
							</div>
							<p>
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
