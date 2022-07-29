<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Daftar Berkas Data Diri
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
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Berkas KK</th>
                                <th scope="col">Berkas KTP</th>
                                <th scope="col">Berkas Ijazah</th>
                              </tr>
                            </thead>
                            <tbody>

                              @forelse ($blogs as $blog)
                                <tr>
                                    <td>{!! $blog->name !!}</td>
                                    <td>{!! $blog->address1 !!}</td>
                                    <td class="text-center"> 
                                        <a href="{{ Storage::url('public/blogs/').$blog->berkas_kk }}" style="display:{{ ($blog->berkas_kk) ? 'block' : 'none' }}" download><u>Download File</u></a>
                                    </td>
                                    <td class="text-center" >
                                        <a href="{{ Storage::url('public/blogs/').$blog->ktp }}" style="display:{{ ($blog->ktp) ? 'block' : 'none' }}" download><u>Download File</u></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ Storage::url('public/blogs/').$blog->ijazah }}" style="display:{{ ($blog->ijazah) ? 'block' : 'none' }}" download><u>Download File</u></a>
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

