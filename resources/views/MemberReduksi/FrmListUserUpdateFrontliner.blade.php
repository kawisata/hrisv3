<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Daftar Update Member Reduksi Frontliner
        </h2>
    </x-slot>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                         <br>
                   <!--      <div class="form-group">
                            <label class="font-weight-bold">Search :
                                <input class="flex-1 form-input border-cool-gray-300 block transition duration-150 ease-in-out sm:text-sm sm:leading-5" wire:model="search" id="search">
                            </label> </br>
                          </div> -->
                        <form action="MemberReduksiFrontlinerUpdate" method="GET">
                        <input type="text" class="relative rounded-md  shadow-sm" name="cari" placeholder="Cari" value="{{ old('cari') }}">
                        <input type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled" value="CARI">
                        </form> </br>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NIPP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kelamin</th>
                                <!--<th scope="col">Sekolah</th> -->
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                              @forelse ($blogs as $blog)
                                <tr>
                                    <td>{!! $blog->nipp !!}</td>
                                    <td>{!! $blog->name !!}</td>
                                    <td>{!! $blog->address !!}</td>
                                    <td>
                                      @if ($blog->gender == '1')
                                        <p class="text">Laki-Laki</p>
                                        @elseif ($blog->gender == '2')
                                        <p class="text">Perempuan</p>
                                        @else
                                        <span style="color: red;">Kosong</span>
                                        @endif
                                    </td>
                                    <!-- <td>{!! $blog->sekolah !!}</td> -->
                                    <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('Berkas.destroy', $blog->id) }}" method="POST"> 
                                        <form>
                                          <a href="{{ route('MemberReduksiFrontlinerUpdate.edit', $blog->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled">UPDATE</a>
                                         <!-- <a href="{{ url('list-kontrak/edit', $blog->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled">DETAIL</a> -->
                                            @csrf
                                            @method('DELETE')
                                          <!--  <button type="submit" class="btn btn-sm btn-danger">HAPUS</button> -->
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data user belum tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $blogs->links() }}    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>