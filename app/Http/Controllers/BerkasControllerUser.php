<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class BerkasControllerUser extends Controller
{
    public function index()
    {
        $blogs = Berkas::latest()->paginate(3);
        return view('Berkas.FrmDaftarBerkas', compact('blogs'));
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
    public function show()
    {
        
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
            'berkas_kk'     => 'required|mimetypes:application/pdf|max:2000',
            'ktp'    => 'required|mimetypes:application/pdf|max:2000',
            'ijazah' => 'required|mimetypes:application/pdf|max:20',
        ],['ijazah.required'=>'No Kontrak Kosong!']);

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
            return redirect()->route('Berkas.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('Berkas.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function edit($id)
    {
        $blog = Berkas::whereUserId($id)->first();
        // return $blog;
        return view('Berkas.FrmPengajuanBerkas', compact('blog'));
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
            'berkas_kk'     => 'mimetypes:application/pdf|max:2000',
            'ktp'           => 'mimetypes:application/pdf|max:2000',
            'ijazah'        => 'mimetypes:application/pdf|max:2000',
        ]);

        //get data Blog by ID
        $blog = Berkas::findOrFail($id);

        $arr = [
         //   'user_id'     => $request->user_id,
            'status_berkas'      => 'Dalam Proses'
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
        if($blog){
            //redirect dengan pesan sukses
            return back();
           // return redirect()->route('/')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return back();
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
            return redirect()->route('Berkas.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('Berkas.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }     
}
