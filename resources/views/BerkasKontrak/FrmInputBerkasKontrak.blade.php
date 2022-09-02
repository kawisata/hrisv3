<x-app-blank>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
     Halaman Input Berkas Kontrak
        </h2>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"</link>
    </x-slot>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('ListKaryawan.store') }}" method="POST" enctype="multipart/form-data">                  
                                @csrf
                                <div class="form-group">
                                    <label class="font-weight-bold">No Urut Kontrak</label>
                                    <select name="no_urut_kontrak" class="form-control" id="no_urut_kontrak">
                                        <option value="">Pilih No Urut Kontrak</option>
                                        <option value="Kontrak 1" @if (old('no_urut_kontrak') == "Kontrak 1") {{ 'selected' }} @endif>Kontrak 1</option>
                                        <option value="Kontrak 2" @if (old('no_urut_kontrak') == "Kontrak 2") {{ 'selected' }} @endif>Kontrak 2</option>
                                        <option value="Kontrak 3" @if (old('no_urut_kontrak') == "Kontrak 3") {{ 'selected' }} @endif>Kontrak 3</option>
                                        <option value="Kontrak 4" @if (old('no_urut_kontrak') == "Kontrak 4") {{ 'selected' }} @endif>Kontrak 4</option>
                                        <option value="Kontrak 5" @if (old('no_urut_kontrak') == "Kontrak 5") {{ 'selected' }} @endif>Kontrak 5</option>
                                        <option value="Kontrak 6" @if (old('no_urut_kontrak') == "Kontrak 6") {{ 'selected' }} @endif>Kontrak 6</option>
                                        <option value="Kontrak 7" @if (old('no_urut_kontrak') == "Kontrak 7") {{ 'selected' }} @endif>Kontrak 7</option>
                                        <option value="Kontrak 8" @if (old('no_urut_kontrak') == "Kontrak 8") {{ 'selected' }} @endif>Kontrak 8</option>
                                        <option value="Kontrak 9" @if (old('no_urut_kontrak') == "Kontrak 9") {{ 'selected' }} @endif>Kontrak 9</option>
                                        <option value="Kontrak 10" @if (old('no_urut_kontrak') == "Kontrak 10") {{ 'selected' }} @endif>Kontrak 10</option>
                                    </select>
                                    @error('no_urut_kontrak')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">No Kontrak</label>
                                    <input type="text" class="form-control @error('no_kontrak') is-invalid @enderror" name="no_kontrak" value="{{ old('no_kontrak') }}" placeholder="Masukkan No Kontrak">          
                                <!--    <x-jet-input-error for="no_kontrak" class="mt-2" /> -->
                                    @error('no_kontrak')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Berkas Kontrak</label>
                                    <input type="file" class="form-control @error('berkas_kontrak') is-invalid @enderror" name="berkas_kontrak">
                                    @error('berkas_kontrak')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Mulai</label>
                                    <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" placeholder="Masukkan Tanggal Mulai">          
                                    @error('tanggal_mulai')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Selesai</label>
                                    <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" placeholder="Masukkan Tanggal Selesai">          
                                    @error('tanggal_selesai')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Upah Pokok</label>
                                    <input type="text" class="form-control @error('upah_pokok') is-invalid @enderror" name="upah_pokok" value="{{ old('upah_pokok') }}" placeholder="Masukkan Upah Pokok">
                                    @error('upah_pokok')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tunjangan Kesetaraan</label>
                                    <input type="text" class="form-control @error('tunjangan_kesetaraan') is-invalid @enderror" name="tunjangan_kesetaraan" value="{{ old('tunjangan_kesetaraan') }}" placeholder="Masukkan Tunjangan Kesetaraan">
                                    @error('tunjangan_kesetaraan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tunjangan Profesional</label>
                                    <input type="text" class="form-control @error('tunjangan_profesional') is-invalid @enderror" name="tunjangan_profesional" value="{{ old('tunjangan_profesional') }}" placeholder="Masukkan Tunjangan Profesional">
                                    @error('tunjangan_profesional')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tunjangan Tidak Tetap PKWT</label>
                                    <input type="text" class="form-control @error('tunjangan_tidak_tetap_pktw') is-invalid @enderror" name="tunjangan_tidak_tetap_pktw" value="{{ old('tunjangan_tidak_tetap_pktw') }}" placeholder="Masukkan Tunjangan Tidak Tetap PKWT">
                                    @error('tunjangan_tidak_tetap_pktw')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="user_id" value="{{ old('id', $blog->id) }}">
                            <div class="text-center">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled">SIMPAN</button>
                            </div>  
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</x-app-blank>