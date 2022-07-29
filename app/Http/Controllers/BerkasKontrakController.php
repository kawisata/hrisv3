<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BerkasKontrak;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class BerkasKontrakController extends Controller
{
    
    public function index(Request $request)
    {
        $data['blogs'] = DB::table('Berkas_Kontrak_Kerja')
        ->leftJoin('users', 'Berkas_Kontrak_Kerja.user_id', '=', 'users.id')
        ->where('user_id', $request->user()->id)
        ->paginate(10);
        
        return view('BerkasKontrak.FrmDaftarBerkasKontrak', $data); 
    } 
    public function edit($id)
    {
        $blog = Berkas::whereUserId($id)->first();
        // return $blog;
        return view('BerkasKontrak.FrmDaftarBerkasKontrak', compact('blog'));
    }
}
