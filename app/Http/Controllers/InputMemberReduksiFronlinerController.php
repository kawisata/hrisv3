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
use App\Models\MemberReduksiInputFrontliner;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
use App\Models\FrontlinerAddress;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
use Carbon\Carbon; 
use Curl;

class InputMemberReduksiFronlinerController extends Controller
{
    public function store(Request $request)
    {
         $this->validate($request, [
             'employee_id'	        => 'required',
             'nipp'              => 'required',
             'name'	            => 'required',
             'birthofdate'	    => 'required',
             'phonenumber'	    => 'required',
             'gender'	        => 'required',
             'address'	        => 'required',
             'reductiontypecode'	=> 'required',
        //     'reductiontypeid'	=> 'required', 
             'cityid'            => 'required',
             'idnum'	            => 'required',
             'startdate'	        => 'required',
             'enddate'	         => 'required', 
             'duration'          => 'required',
             'email'	            => 'required',
             'idtype'	        => 'required',
             'employeetype'	    => 'required', 
         ]);

       /* $check = MemberReduksi::whereIdnum($request->idnum)->count();
       
        if ($check>0) {
            return back()->with('alert', 'Pegawai Sudah Menjadi Member! Silakan Cek Pada Halaman Update Member Reduksi');
        } */
        
        if ($request->gender==('Perempuan')) {
            $gender1 = ('2');
        } 
        elseif ($request->gender==('Laki-laki')) {
            $gender1 = ('1');
        }
  
        switch ($request->reductiontypecode) {
            case 'SUBSIDIARY50': $reductiontypeid1 = ('321');
            break;
            case 'SUBSIDIARY75': $reductiontypeid1 = ('263');
            break;
        }
        $currentTime = Carbon::now();
        $blog = MemberReduksiInputFrontliner::create([
            
            'nipp'              => $request->nipp.'KAWISTA',
            'employee_id'	    => $request->employee_id,
            'name'	            => $request->name,
            'birthofdate'	    => $request->birthofdate,
            'phonenumber'	    => $request->phonenumber,
            'gender'	        => $gender1,
            'address'	        => $request->address,
            'reductiontypecode'	=> $request->reductiontypecode,
            'reductiontypeid'	=> $reductiontypeid1,
            'cityid'            => $request->cityid,
            'idnum'	            => $request->idnum,
            'requestdate'	    => $request->requestdate.' 00:00',
            'startdate'	        => $request->startdate.' 00:00',
            'enddate'	        => $request->enddate.' 23:59',
            'duration'          => $request->duration,
            'email'	            => $request->email,
            'idtype'	        => $request->idtype,
            'employeetype'	    => $request->employeetype,
            'token'             => $request->_token,
           
        ]);
    
        $callbacksave = MemberReduksiFronliner::whereId($request->employee_id)->update([
            'status_member' => 'Member'
        ]); 
        $apibody = [
            'nipp'              => $request->nipp.'KAWISTA',
            'name'	            => $request->name,
            'birthofdate'	    => $request->birthofdate,
            'phonenumber'	    => $request->phonenumber,
            'gender'	        => $gender1,
            'address'	        => $request->address,
            'reductiontypecode'	=> $request->reductiontypecode,
            'reductiontypeid'	=> $reductiontypeid1,
            'cityid'            => $request->cityid,
            'idnum'	            => $request->idnum,
            'requestDate'	    => $request->requestdate.' 00:00',
            'startdate'	        => $request->startdate.' 00:00',
            'enddate'	        => $request->enddate.' 23:59',
            'duration'          => $request->duration,
            'email'	            => $request->email,
            'idtype'	        => $request->idtype,
            'employeetype'	    => $request->employeetype,
            ];

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://memsvcdev.kai.id:8001/rtsng_reduction/add_member_ap',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'[{
            "nipp": "'.$request->nipp.'KAWISTA'.'",
            "name": "'.$request->name.'",
            "birthofdate": "'.$request->birthofdate.'",
            "phonenumber": "'.$request->phonenumber.'",
            "gender": "'.$gender1.'",
            "address": "'.$request->address.'",
            "reductiontypecode": "'.$request->reductiontypecode.'",
            "reductiontypeid": "'.$reductiontypeid1.'",
            "cityid": "'.$request->cityid.'",
            "idnum": "'.$request->idnum.'",
            "requestDate": "'.$request->requestdate.' 00:00'.'",
            "startdate": "'.$request->startdate.' 00:00'.'",
            "enddate": "'.$request->enddate.' 23:59'.'",
            "duration": 0,
            "email":"'.$request->email.'",
            "idtype":"'.$request->idtype.'",
            "employeetype":"'.$request->employeetype.'"
            }]',
              CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
              ),
            ));
           
            $result = curl_exec($curl);
            //dd($result);
            curl_close($curl);

        $result = json_decode($result, true);
        
        if ($result['status'] == 00) {
            //return back()->with('alert', 'Data Member Telah DiProses!');
            return redirect()->route('MemberReduksiFrontliner.index')->with('alert', 'Data Member Telah DiProses!');
            //return "Succes!";
        } else {
            return back()->with('alert', 'Proses Data Gagal!');
        }
    }
    public function index()
    {
      
       $cari = (!empty($_GET['cari'])) ? $_GET['cari'] : "";

       $blogs = MemberReduksiFronliner::with('frontlineraddress')
       ->where('status_member', '=', 'Belum Member');
        if ($cari) {
            $blogs=$blogs->where(function ($query) use ($cari) {
                $query->where('name','like',"%".$cari."%")
                      ->orWhere('id', 'like',"%".$cari."%");
                    });
        }
//   return $blogs->latest()->paginate(3);
        $data['blogs'] = $blogs->latest()->paginate(10);
        return view('MemberReduksi.FrmListUserFrontliner', $data); 

   //     $blogs = MemberReduksiFronliner::with('frontlinerusers', 'frontlineraddress')->latest()->paginate(6);
       // return $blogs;
   //     return view('MemberReduksi.FrmListUserFrontliner', compact('blogs'));
    }
    public function edit($id)
    {
        $blog = MemberReduksiFronliner::with('frontlineraddress')->whereId($id)->first();
        //$blog = MemberReduksiFronliner::whereId($id)->first();
        //$blog = FrontlinerAddress::latest();
        //return $blog;
        //dd($blog);
        return view('MemberReduksi.FrmInputMemberReduksiFrontliner', compact('blog'));
    }
}
