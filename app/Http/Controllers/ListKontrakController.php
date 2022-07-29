<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BerkasKontrak;
use Illuminate\Support\Facades\Storage;


class ListKontrakController extends Controller
{
    public function edit($id)
    {
        $blog = BerkasKontrak::whereUserId($id)->get();
        return view('BerkasKontrak.FrmDetailBerkasKontrak', compact('blog'));
    }
    public function destroy($id)
    {
        $blog = BerkasKontrak::findOrFail($id);
        Storage::disk('local')->delete('public/blogs/'.$blog->berkas_kontrak);
        $blog->delete();

        if($blog){
            //redirect dengan pesan sukses
            return back();
            //return redirect()->route('BerkasKontrak.FrmDetailBerkasKontrak')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return back();
            //redirect dengan pesan error
            //return redirect()->route('BerkasKontrak.FrmDetailBerkasKontrak')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }     
}
