<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class DaftarBerkas extends Controller
{
    public function index(Request $request)
    {
        $data['blogs'] = DB::table('employee_details')
        ->leftJoin('users', 'employee_details.user_id', '=', 'users.id')
        ->where('user_id', $request->user()->id)
        ->paginate(10);
        
        return view('Berkas.FrmDaftarBerkas', $data); 
    } 
    public function edit($id)
    {
        $blog = Berkas::whereUserId($id)->first();
        // return $blog;
        return view('Berkas.FrmDaftarBerkas', compact('blog'));
    }
}

