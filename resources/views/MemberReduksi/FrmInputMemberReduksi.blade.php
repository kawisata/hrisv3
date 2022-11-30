<x-app-blank>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
     Input Member Reduksii
        </h2>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"</link>
    </x-slot>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('MemberInputReduksi.store') }}" method="POST" enctype="multipart/form-data">                  
                            @csrf
                            <div class="form-group">
                                    <label class="font-weight-bold">NIPP</label>
                                    <input type="text" class="form-control @error('nipp') is-invalid @enderror" name="nipp" value="{{ old('nipp', $blog->user_id) }}" readonly placeholder="Masukkan No NIPP">          
                                <!--    <x-jet-input-error for="no_kontrak" class="mt-2" /> -->
                                    @error('nipp')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">No KTP</label>
                                    <input type="number" class="form-control @error('idnum') is-invalid @enderror" name="idnum" value="{{ old('idnum', $blog->nik) }}" readonly placeholder="Masukkan No KTP">          
                                <!--    <x-jet-input-error for="no_kontrak" class="mt-2" /> -->
                                    @error('idnum')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $blog->user->name) }}" readonly placeholder="Masukkan Nama">          
                                <!--    <x-jet-input-error for="no_kontrak" class="mt-2" /> -->
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Lahir</label>
                                    <input type="text" class="form-control @error('birthofdate') is-invalid @enderror" name="birthofdate" value="{{ old('birthofdate', $blog->employee->tanggal_lahir) }}" readonly placeholder="Masukkan Tanggal Lahir">          
                                    @error('birthofdate')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Jenis Kelamin</label>
                                    <input type="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender', $blog->kelamin) }}" readonly placeholder="Masukkan No Jenis Kelamin">          
                                  <!--<x-jet-input-error for="no_kontrak" class="mt-2" /> -->
                                    @error('gender')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                   <!-- <select name="gender" class="form-control" id="gender">
                                        <option value="{{ old('gender', $blog->kelamin) }}">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki" @if (old('gender') == "Laki-Laki") {{ 'selected' }} @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if (old('gender') == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror -->
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Alamat</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $blog->address1) }} {{ old('address', $blog->address2) }}" readonly placeholder="Masukkan Alamat">          
                                <!--    <x-jet-input-error for="no_kontrak" class="mt-2" /> -->
                                    @error('address')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $blog->user->email) }}" readonly placeholder="Masukkan Email">
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">No Telepon</label>
                                    <input type="number" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber', $blog->phone) }}" placeholder="Masukkan No Telepon">          
                                  <!--<x-jet-input-error for="no_kontrak" class="mt-2" /> -->
                                    @error('phonenumber')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tipe Reduksi</label>
                                    <select name="reductiontypecode" class="form-control" id="reductiontypecode">
                                        <option value="">Pilih Tipe Reduksi</option>
                                        <option value="SUBSIDIARY50" @if (old('reductiontypecode') == "SUBSIDIARY50") {{ 'selected' }} @endif>SUBSIDIARY50</option>
                                        <option value="SUBSIDIARY75" @if (old('reductiontypecode') == "SUBSIDIARY75") {{ 'selected' }} @endif>SUBSIDIARY75</option>
                                    </select>
                                    @error('reductiontypecode')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div> 
                               <!-- <div class="form-group">
                                    <label class="font-weight-bold">ID Reduksi</label>
                                    <select name="reductiontypeid" class="form-control" id="reductiontypeid">
                                        <option value="">Pilih Tipe Reduksi</option>
                                        <option value="321" @if (old('reductiontypeid') == "321") {{ 'selected' }} @endif>SUBSIDIARY50</option>
                                        <option value="263" @if (old('reductiontypeid') == "263") {{ 'selected' }} @endif>SUBSIDIARY75</option>
                                    </select>
                                    @error('reductiontypeid')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div> -->
                                <input type="hidden" name="cityid" value="0">
                                
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Aktif Keanggotaan</label>
                                    <input type="date" class="form-control @error('startdate') is-invalid @enderror" name="startdate" value="{{ old('startdate') }}" placeholder="Masukkan Tanggal Aktif Keanggotaan">          
                                    @error('startdate')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Akhir Aktif Keanggotaan</label>
                                    <input type="date" class="form-control @error('enddate') is-invalid @enderror" name="enddate" value="{{ old('enddate') }}" placeholder="Masukkan Tanggal Akhir Aktif Keanggotaan">          
                                    @error('enddate')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="duration" value="0">
                                <input type="hidden" name="idtype" value="1">
                                <input type="hidden" name="user_id" value="{{ old('user_id', $blog->user_id) }}">
                                
                                <input type="hidden" name="requestdate" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" />
                                <div class="form-group">
                                    <label class="font-weight-bold">Tipe Karyawan</label>
                                    <select name="employeetype" class="form-control" id="employeetype">
                                        <option value="">Pilih Tipe Karyawan</option>
                                        <option value="WD" @if (old('employeetype') == "WD") {{ 'selected' }} @endif>KAWISATA DIREKSI</option>
                                        <option value="WK" @if (old('employeetype') == "WK") {{ 'selected' }} @endif>KAWISATA KONTRAK</option>
                                        <option value="WM" @if (old('employeetype') == "WM") {{ 'selected' }} @endif>KAWISATA MANDIRI</option>
                                    </select>
                                    @error('employeetype')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
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