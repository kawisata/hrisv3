<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Halaman Pengajuan Berkas
        </h2>
    </x-slot>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('BerkasUser.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

    <!--        <div class="col-span-6 md:col-span-4">
                <div class="">
                    <div class="flex justify-between mb-1">
                        <label class="block text-sm font-medium text-secondary-700 dark:text-gray-400">Berkas KK (Kartu Keluarga) :</label>    
                    </div>
                    <div class="relative rounded-md  shadow-sm ">
                        <input type="file" class="form-control" name="berkas_kk"> </br>
                    </div>
                    <div class="text-center" style="display:{{ ($blog->berkas_kk) ? 'block' : 'none' }} ">
                        <embed src="{{ Storage::url('public/blogs/').$blog->berkas_kk }}" class="rounded" style="width: 300px">
                    </div>
                </div>
            </div> -->
                            <p>NOTE : Upload berkas dengan format PDF dan Size MAX 2 MB</p>

                            <div class="form-group">
                                <label class="font-weight-bold">Berkas KK (Kartu Keluarga) &emsp;&emsp;&emsp;&emsp;&emsp; :</label> 
                                <input type="file" name="berkas_kk"> </br>
                                @error('berkas_kk')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                @enderror
                                <div></div>
                                <div class="text-center" style="display:{{ ($blog->berkas_kk) ? 'block' : 'none' }}">
                                    <center>
                                    <embed src="{{ Storage::url('public/blogs/').$blog->berkas_kk }}" class="rounded" style="width: 300px">
                                    </center>
                                </div>
                            </div>
                            </br>
                            <div class="form-group">
                                <label class="font-weight-bold">Berkas KTP (Kartu Tanda Penduduk) &emsp;: </label>  
                                <input type="file" name="ktp">
                                @error('ktp')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                @enderror
                                <div class="text-center" style="display:{{ ($blog->ktp) ? 'block' : 'none' }}">
                                    <center>
                                    <embed src="{{ Storage::url('public/blogs/').$blog->ktp }}" class="rounded" style="width: 300px">
                                    </center>
                                </div>
                            </div>
                            </br>
                            <div class="form-group">
                                <label class="font-weight-bold">Berkas Ijazah &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</label>
                                <input type="file" name="ijazah">
                              <!--  <x-jet-input-error for="ijazah" class="mt-2" /> -->
                                @error('ijazah')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                @enderror
                                <div class="text-center" style="display:{{ ($blog->ijazah) ? 'block' : 'none' }}">
                                    <center>    
                                    <embed src="{{ Storage::url('public/blogs/').$blog->ijazah }}" class="rounded" style="width: 300px">
                                    </center>
                                </div>
                              
                            </div>
                            </br>
                            <div class="text-center">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled">AJUKAN BERKAS</button>
                            </div> 
                            <label class="font-weight-bold">Riwayat Pengajuan Berkas :</label>
                            <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kelamin</th>
                                <th scope="col">Pendidikan</th>
                                <th scope="col">Sekolah</th>
                                <th scope="col">Status Berkas</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ $blog->address1 }}</td>
                                    <td>{{ $blog->kelamin }}</td>
                                    <td>{{ $blog->pendidikan }}</td>
                                    <td>{{ $blog->sekolah }}</td>
                                    <td>
                                        @if ($blog->status_berkas == 'Dalam Proses')
                                        <p class="text">Dalam Proses</p>
                                        @elseif ($blog->status_berkas == 'Berkas Diterima')
                                        <span style="color: blue;">Berkas Diterima</span>
                                        @elseif ($blog->status_berkas == 'Berkas Ditolak')
                                        <span style="color: red;">Berkas Ditolak</span>
                                        @else
                                        <span style="color: red;">Berkas Kosong</span>
                                        @endif
                                    </td> 
                                </tr>
                            </tbody>
                          </table>                        
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</x-app-layout>