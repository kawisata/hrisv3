<x-app-blank>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
     		Halaman Import Tanggal Aktif Pegawai
		</h2>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"</link>
	</x-slot>
	<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        
					{{-- notifikasi form validasi --}}
					@if ($errors->has('file'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('file') }}</strong>
					</span>
					@endif

					@if ($errors->any())
						@foreach ($errors->all() as $error)
						<div class="alert alert-danger alert-block">
							<button type="button" class="close" data-dismiss="alert">×</button> 
							<strong>Format berkas tidak sesuai</strong>
						</div>
						@endforeach
					@endif
			
					{{-- notifikasi sukses --}}
					@if ($sukses = Session::get('sukses'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{{ $sukses }}</strong>
					</div>
					@endif
			
					<button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
						Import File Excel
					</button>
					<a href="{{ url('/') }}/storage/Import_Start&End.xlsx" class="btn btn-success my-3">Download Template Excel</a>


					<br/>
					<!-- Import Excel -->
					<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						<form method="post" action="{{ url('Frontliner/import_excel') }}" enctype="multipart/form-data"> 
							<!--<form action="Frontliner/import_excel" method="POST" enctype="multipart/form-data">   -->               
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
									</div>
									<div class="modal-body">
			
										{{ csrf_field() }}
			
										<label>Pilih file excel</label>
										<div class="form-group">
											<input type="file" name="file" required="required">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Import</button>
									</div>
								</div>
							</form>
						</div>
					</div>
			
					<table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Aktif</th>
                                <th scope="col">Tanggal Akhir Aktif</th>
                              </tr>
                            </thead>
                            <tbody>

                              @forelse ($blogs as $blog)
                                <tr>
                                    <td>{!! $blog->id !!}</td>
                                    <td>{!! $blog->name !!}</td>
                                    <td>{!! $blog->startdate !!}</td>
                                    <td>{!! $blog->enddate !!}</td>
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

 
 
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</x-app-blank>