<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BerkasKontrak;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class BerkasKontrakUserController extends Controller
{
    public function index(Request $request)
    {
        $cari = (!empty($_GET['cari'])) ? $_GET['cari'] : "";

        $blogs = DB::table('employee_details')
        ->leftJoin('users', 'employee_details.user_id', '=', 'users.id');

        if ($cari) {
            $blogs=$blogs->where(function ($query) use ($cari) {
                $query->where('users.name','like',"%".$cari."%")
                      ->orWhere('employee_details.user_id', 'like',"%".$cari."%");
                    });
        }

        $data['blogs']=$blogs->paginate(10);
        return view('BerkasKontrak.FrmListUser', $data); 
    } 
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        
        // mengambil data dari table guru sesuai pencarian data
        $data['blogs'] = DB::table('employee_details')
        ->leftJoin('users', 'employee_details.user_id', '=', 'users.id')
        ->where(function ($query) use ($cari) {
            $query->where('users.name','like',"%".$cari."%");
                 // ->orWhere('d', '=', 1);
                })
        ->paginate();
        // mengirim data pegawai ke view index
        return view('BerkasKontrak.FrmListUser',['employee_details' => $data]);
    }
    public function edit($id)
    {
        $blog = User::findOrFail($id);
        return view('BerkasKontrak.FrmInputBerkasKontrak', compact('blog'));
    }
    public function create()
    {
        return view('BerkasKontrak.FrmInputBerkasKontrak');
    }
    
    public function show()
    {
        # code...
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_urut_kontrak'	    => 'required',
            'no_kontrak'            => 'required',
            'berkas_kontrak'	    => 'required|mimetypes:application/pdf|max:2000',
            'tanggal_mulai'	        => 'required',
            'tanggal_selesai'	    => 'required',
            'upah_pokok'	        => 'required',
            'tunjangan_kesetaraan'	=> 'required',
            'tunjangan_profesional'	=> 'required', 
            'tunjangan_tidak_tetap_pktw' => 'required',
        ],['no_kontrak.required'=>'No Kontrak Kosong!']);

        $check = BerkasKontrak::whereUserId($request->user_id)->whereNoUrutKontrak($request->no_urut_kontrak)->count();
        $check1 = BerkasKontrak::whereUserId($request->user_id)->whereNoKontrak($request->no_kontrak)->count();

        if ($check>0) {
            return back()->with('alert', 'No Urut Berkas Sudah Ada!');
        }
        elseif ($check1>0) {
            return back()->with('alert', 'No Berkas Sudah Ada!');
        }      
        //upload image
        $berkas_kontrak = $request->file('berkas_kontrak');
        $berkas_kontrak->storeAs('public/blogs', $berkas_kontrak->hashName());

        $blog = BerkasKontrak::create([
            'user_id'              => $request->user_id,
            'no_urut_kontrak'      => $request->no_urut_kontrak,
            'no_kontrak'           => $request->no_kontrak,
            'berkas_kontrak'       => $berkas_kontrak->hashName(),
            'tanggal_mulai'        => $request->tanggal_mulai,
            'tanggal_selesai'      => $request->tanggal_selesai,
            'upah_pokok'           => $request->upah_pokok,
            'tunjangan_kesetaraan' => $request->tunjangan_kesetaraan,
            'tunjangan_profesional'=> $request->tunjangan_profesional,
            'tunjangan_tidak_tetap_pktw'=> $request->tunjangan_tidak_tetap_pktw
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect()->route('ListKaryawan.index')->with(['success' => 'Data Berhasil Disimpan!']);
            //return back();
        }else{
            //return back();
            //redirect dengan pesan error
            return redirect()->route('ListKaryawan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
