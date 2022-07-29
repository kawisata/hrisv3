<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Berkas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div style="font-size: 24px; text-align: center; font-weight: bold;">
                        Halaman Pengajuan Berkas
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Berkas.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Berkas KK</label>
                                <input type="file" class="form-control @error('berkas_kk') is-invalid @enderror" name="berkas_kk">
                            
                                <!-- error message untuk title -->
                                @error('berkas_kk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Berkas KTP</label>
                                <input type="file" class="form-control @error('berkas_ktp') is-invalid @enderror" name="berkas_ktp">
                            
                                <!-- error message untuk title -->
                                @error('berkas_ktp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Berkas Ijazah</label>
                                <input type="file" class="form-control @error('berkas_ijazah') is-invalid @enderror" name="berkas_ijazah">
                            
                                <!-- error message untuk title -->
                                @error('berkas_ijazah')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
 
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>