<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('Berkas.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Berkas KK</label>
                                <input type="file" class="form-control" name="berkas_kk">
                                <embed src="{{ Storage::url('public/blogs/').$blog->berkas_kk }}" class="rounded" style="width: 200px">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Berkas KTP</label>
                                <input type="file" class="form-control" name="berkas_ktp">
                                <embed src="{{ Storage::url('public/blogs/').$blog->berkas_ktp }}" class="rounded" style="width: 200px">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Berkas Ijazah</label>
                                <input type="file" class="form-control" name="berkas_ijazah">
                                <embed src="{{ Storage::url('public/blogs/').$blog->berkas_ijazah }}" class="rounded" style="width: 200px">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

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