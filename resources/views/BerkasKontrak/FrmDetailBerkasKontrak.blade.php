<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detail Berkas Kontrak 
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                <!--    <a href="{{ route('Berkas.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BERKAS</a> -->
                        <br>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No Urut Kontrak</th>
                                <th scope="col">No Kontrak</th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Upah Pokok</th>
                                <th scope="col">Tunjangan Kesetaraan</th>
                                <th scope="col">Tunjangan Profesional</th>
                                <th scope="col">Tunjangan PKWT</th>
                                <th scope="col">Berkas Kontrak</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($blog as $blogs)
                                <tr>
                                    <td>{!! $blogs->no_urut_kontrak !!}</td>
                                    <td>{!! $blogs->no_kontrak !!}</td>
                                    <td>{!! $blogs->tanggal_mulai !!}</td>
                                    <td>{!! $blogs->tanggal_selesai !!}</td>
                                    <td>{!! $blogs->upah_pokok !!}</td>
                                    <td>{!! $blogs->tunjangan_kesetaraan !!}</td>
                                    <td>{!! $blogs->tunjangan_profesional !!}</td>
                                    <td>{!! $blogs->tunjangan_tidak_tetap_pktw !!}</td>
                                    <td class="text-center">
                                        <a href="{{ Storage::url('public/blogs/').$blogs->berkas_kontrak }}" style="display:{{ ($blogs->berkas_kontrak) ? 'block' : 'none' }}" download><u>Download File</u></a>
                                    </td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('ListKontrak.destroy', $blogs->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" wire:loading.attr="disabled">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data berkas belum tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

