<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class BerkasController extends Controller
{
    public function index()
    {
      /*  $data['blogs'] = DB::table('employee_details')
        ->leftJoin('users', 'employee_details.user_id', '=', 'users.id')
        ->where('employee_details.status_berkas', '=', 'Dalam Proses')
        ->paginate(3);
        
        return view('Berkas.FrmListPengajuanBerkas', $data);  */


        $cari = (!empty($_GET['cari'])) ? $_GET['cari'] : "";

        $blogs = DB::table('employee_details')
        ->leftJoin('users', 'employee_details.user_id', '=', 'users.id')
        ->where('employee_details.status_berkas', '=', 'Dalam Proses');
        if ($cari) {
            $blogs=$blogs->where(function ($query) use ($cari) {
                $query->where('users.name','like',"%".$cari."%")
                      ->orWhere('employee_details.nik', 'like',"%".$cari."%");
                    });
        }

        $data['blogs']=$blogs->paginate(10);
        return view('Berkas.FrmListPengajuanBerkas', $data);
    }
    
    /**
    * create
    *
    * @return void
    */
    public function create()
    {
        return view('Berkas.create');
    }
    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
       
        $blogs = Berkas::latest()->paginate(3);
      

        $this->validate($request, [
            'berkas_kk' => 'required|mimetypes:application/pdf|max:2000',
            'ktp'       => 'required|mimetypes:application/pdf|max:2000',
            'ijazah'    => 'required|mimetypes:application/pdf|max:2000',       
           
        ]);

        //upload berkas
        $berkas_kk = $request->file('berkas_kk');
        $berkas_kk->storeAs('public/blogs', $berkas_kk->hashName());
        $ktp = $request->file('ktp');
        $ktp->storeAs('public/blogs', $ktp->hashName());
        $ijazah = $request->file('ijazah');
        $ijazah->storeAs('public/blogs', $ijazah->hashName());

        $blog = Berkas::create([
            'berkas_kk'     => $berkas_kk->hashName(),
            'ktp'    => $ktp->hashName(),
            'ijazah' => $ijazah->hashName(),
            'user_id'       => Auth::user()->id,
            'status'        => 'Dalam Proses'
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('Berkas.FrmListPengajuanBerkas')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('Berkas.FrmListPengajuanBerkas')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function edit($id)
    {
        $blog = Berkas::whereUserId($id)->first();
        return view('Berkas.FrmPersetujuanBerkas', compact('blog'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
        ]);

        //get data Blog by ID
        $blog = Berkas::findOrFail($id);

        $arr = [
         //   'user_id'     => $request->user_id,
            'status_berkas'      => $request->status_berkas
        ];

        $blog->update($arr);
     
        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('Berkas.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('Berkas.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function show()
    {
        # code...
    }
    
    public function tolakberkas(Request $request, $id)
    {
        $this->validate($request, [
            'berkas_kk'     => 'mimetypes:application/pdf|max:2000',
            'ktp'    => 'mimetypes:application/pdf|max:2000',
            'ijazah' => 'mimetypes:application/pdf|max:2000',
        ]);

        //get data Blog by ID
        $blog = Berkas::findOrFail($id);

        $arr = [
         //   'user_id'     => $request->user_id,
            'status_berkas'      => 'Berkas Ditolak'
        ];
 
        if(!empty($request->file('berkas_kk'))) {
            //hapus old image
            Storage::disk('local')->delete('public/blogs/'.$blog->berkas_kk);

            //upload new image
            $berkas_kk = $request->file('berkas_kk');
            $berkas_kk->storeAs('public/blogs', $berkas_kk->hashName());

            $arr['berkas_kk'] = $berkas_kk->hashName();
        }

        if(!empty($request->file('ktp'))) {
            //hapus old image
            Storage::disk('local')->delete('public/blogs/'.$blog->ktp);

            //upload new image
            $ktp = $request->file('ktp');
            $ktp->storeAs('public/blogs', $ktp->hashName());

            $arr['ktp'] = $ktp->hashName();
        }

        if(!empty($request->file('ijazah'))) {
            //hapus old image
            Storage::disk('local')->delete('public/blogs/'.$blog->ijazah);

            //upload new image
            $ijazah = $request->file('ijazah');
            $ijazah->storeAs('public/blogs', $ijazah->hashName());

            $arr['ijazah'] = $ijazah->hashName();
        }


        $blog->update($arr);
     //   dd($blog);
        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('Berkas.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('Berkas.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        $blog = Berkas::findOrFail($id);
        Storage::disk('local')->delete('public/blogs/'.$blog->berkas_kk);
        Storage::disk('local')->delete('public/blogs/'.$blog->ktp);
        Storage::disk('local')->delete('public/blogs/'.$blog->ijazah);
        $blog->delete();

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('Berkas.FrmListPengajuanBerkas')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('Berkas.FrmListPengajuanBerkas')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }     
}
