<?php

namespace App\Http\Controllers;
use App\MemberReduksiInputFrontliner;
use App\Models\UserFrontliner;

use Session;
 
//use App\Exports\SiswaExport;
use App\Imports\FrontlinetImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportFrontliner extends Controller
{
	public function index()
	{
		$blogs = UserFrontliner::latest()->paginate(10);
		return view('MemberReduksi.FrmImportDate',['blogs'=>$blogs]);
	}
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_Fronliner di dalam folder public
		$file->move('file_Fronliner',$nama_file);
 
		// import data
		Excel::import(new FrontlinetImport, public_path('/file_Fronliner/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('ImportDate');
	}
}
