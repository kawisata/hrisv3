<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('Berkas.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BERKAS</a>
         
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Berkas KK</th>
                                <th scope="col">Berkas KTP</th>
                                <th scope="col">Berkas Ijazah</th>
                                <th scope="col">Status Berkas</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($blogs as $blog)
                                <tr>
                                    <td>{!! $blog->user_id !!}</td>
                                    <td>{!! $blog->user_id !!}</td>
                                    <td class="text-center">
                                        <embed src="{{ Storage::url('public/blogs/').$blog->berkas_kk }}" class="rounded" style="width: 200px">
                                    </td>
                                    <td class="text-center">
                                        <embed src="{{ Storage::url('public/blogs/').$blog->berkas_ktp }}" class="rounded" style="width: 200px">
                                    </td>
                                    <td class="text-center">
                                        <embed src="{{ Storage::url('public/blogs/').$blog->berkas_ijazah }}" class="rounded" style="width: 200px">
                                    </td>
                                    <td>{!! $blog->status !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('BerkasUser.destroy',$blog->user_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="" class="btn btn-sm btn-primary">EDIT</a>
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data pengajuan berkas belum tersedia.
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>