<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Daftar Berkas Kontrak
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
                                <th scope="col">Berkas Kontrak</th>
                              </tr>
                            </thead>
                            <tbody>

                              @forelse ($blogs as $blog)
                                <tr>
                                    <td>{!! $blog->no_urut_kontrak !!}</td>
                                    <td>{!! $blog->no_kontrak !!}</td>
                                    <td>{!! $blog->tanggal_mulai !!}</td>
                                    <td>{!! $blog->tanggal_selesai !!}</td>
                                    <td class="text-center">
                                        <a href="{{ Storage::url('public/blogs/').$blog->berkas_kontrak }}" style="display:{{ ($blog->berkas_kontrak) ? 'block' : 'none' }}" download><u>Download File</u></a>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data berkas belum tersedia.
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

