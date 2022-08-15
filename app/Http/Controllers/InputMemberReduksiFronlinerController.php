<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
Use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Berkas;
use App\Models\EmployeeModel;
use App\Models\MemberReduksi;
use App\Models\MemberReduksiFronliner;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
use Carbon\Carbon; 
use Curl;

class InputMemberReduksiFronlinerController extends Controller
{
    public function index()
    {
      
       $cari = (!empty($_GET['cari'])) ? $_GET['cari'] : "";

       $blogs = MemberReduksiFronliner::with('frontlinerusers', 'frontlineraddress');
       // ->where('employee_details.status_member', '=', 'Belum Member');
        if ($cari) {
            $blogs=$blogs->where(function ($query) use ($cari) {
                $query->where('name','like',"%".$cari."%")
                      ->orWhere('nip', 'like',"%".$cari."%");
                    });
        }
        //return $blogs->latest()->paginate(10);
        $data['blogs'] = $blogs->latest()->paginate(10);
        return view('MemberReduksi.FrmListUserFrontliner', $data); 

   //     $blogs = MemberReduksiFronliner::with('frontlinerusers', 'frontlineraddress')->latest()->paginate(6);
       // return $blogs;
   //     return view('MemberReduksi.FrmListUserFrontliner', compact('blogs'));
    }
    public function edit($id)
    {
        $blog = MemberReduksiFronliner::with('frontlinerusers', 'frontlineraddress')->whereNip($id)->first();
        // return $blog;
        //dd($blog);
        return view('MemberReduksi.FrmInputMemberReduksiFrontliner', compact('blog'));
    }
}
