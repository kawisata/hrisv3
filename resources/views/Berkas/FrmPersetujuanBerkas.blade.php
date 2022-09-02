<x-app-blank>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Halaman Persetujuan Berkas
        </h2>
    </x-slot>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('Berkas.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status_berkas" value="Berkas Diterima">
                            <div class="form-group">
                                <label class="font-weight-bold">Berkas KK (Kartu Keluarga)        :</label>
                                <div class="text-center" style="display:{{ ($blog->berkas_kk) ? 'block' : 'none' }}">
                                    <center>
                                     <embed src="{{ Storage::url('public/blogs/').$blog->berkas_kk }}" class="rounded" style="width: 500px" height="500px">
                                    </center>
                                </div>
                                <input type="file" class="form-control" name="berkas_kk" style="visibility: hidden">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Berkas KTP (Kartu Tanda Penduduk) :</label>
                                <div class="text-center" style="display:{{ ($blog->ktp) ? 'block' : 'none' }}">
                                    <center>
                                    <embed src="{{ Storage::url('public/blogs/').$blog->ktp }}" class="rounded" style="width: 500px" height="500px">
                                    </center>
                                </div>
                                    <input type="file" class="form-control" name="ktp" style="visibility: hidden">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Berkas Ijazah                     :</label>
                                <div class="text-center" style="display:{{ ($blog->ijazah) ? 'block' : 'none' }}">
                                    <center>    
                                    <embed src="{{ Storage::url('public/blogs/').$blog->ijazah }}" class="rounded" style="width: 500px" height="500px">
                                    </center>
                                </div>

                                    <input type="file" class="form-control" name="ijazah" style="visibility: hidden">
                                    <input type="text" style="visibility: hidden" class="form-control" name="user_id" value="{{ old('user_id', $blog->user_id) }} ">
                            
                            </div>
                            <div class="text-center">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled">SETUJUI BERKAS</button>
                                <button type="button" onclick="$('#tolakberkas').submit()" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled">TOLAK BERKAS</button> 
                            </div>
                     <!--   <button type="submit" class="btn btn-md btn-primary">UPDATE</button> -->           
                        </form> 
                        <form action="{{ route('Berkas.update', $blog->id) }}" method="POST" id="tolakberkas">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status_berkas" value="Berkas Ditolak">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</x-app-blank>