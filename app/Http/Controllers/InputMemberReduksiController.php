<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
Use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Berkas;
use App\Models\EmployeeModel;
use App\Models\MemberReduksi;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
use Carbon\Carbon; 
use Curl;

class InputMemberReduksiController extends Controller
{
    public function index()
    {
      
        $cari = (!empty($_GET['cari'])) ? $_GET['cari'] : "";

        $blogs = DB::table('employee_details')
        ->leftJoin('users', 'employee_details.user_id', '=', 'users.id')
        ->where('employee_details.status_member', '=', 'Belum Member');
        if ($cari) {
            $blogs=$blogs->where(function ($query) use ($cari) {
                $query->where('users.name','like',"%".$cari."%")
                      ->orWhere('employee_details.user_id', 'like',"%".$cari."%");
                    });
        }

        $data['blogs']=$blogs->paginate(10);
        return view('MemberReduksi.FrmListUser', $data);

    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           
            'nipp'              => 'required',
            'name'	            => 'required',
            'birthofdate'	    => 'required',
            'phonenumber'	    => 'required',
            'gender'	        => 'required',
            'address'	        => 'required',
            'reductiontypecode'	=> 'required',
            //'reductiontypeid'	=> 'required', 
            'cityid'            => 'required',
            'idnum'	            => 'required',
            //'requestdate'	    => 'required',
            'startdate'	        => 'required',
            'enddate'	        => 'required', 
            'duration'          => 'required',
            'email'	            => 'required',
            'idtype'	        => 'required',
            'employeetype'	    => 'required', 
        ]);

        //get data Blog by ID
        //$reductiontypeid1;
        if ($request->gender==('Perempuan')) {
            $gender1 = ('2');
        } 
        elseif ($request->gender==('Laki-Laki')) {
            $gender1 = ('1');
        }
  
        switch ($request->reductiontypecode) {
            case 'SUBSIDIARY50': $reductiontypeid1 = ('321');
            break;
            case 'SUBSIDIARY75': $reductiontypeid1 = ('263');
            break;
        }
       
        $blog = MemberReduksi::findOrFail($id);
        $currentTime = Carbon::now();
        $arr = [
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
            'requestdate'	    => $request->requestdate.' 00:00',
            'startdate'	        => $request->startdate.' 00:00',
            'enddate'	        => $request->enddate.' 23:59',
            'duration'          => $request->duration,
            'email'	            => $request->email,
            'idtype'	        => $request->idtype,
            'employeetype'	    => $request->employeetype,
            'token'             => $request->_token,
            'status_member'     => 'Member'
        ];
      //  dd($arr);

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
            $blog->update($arr);
            return back()->with('alert', 'Data Member Telah DiProses!');
            //return "Succes!";
        } else {
            return back()->with('alert', 'Proses Data Gagal!');
        }
    }
    public function store(Request $request)
    {
	// used link MemberInputReduksi
         $this->validate($request, [
             'user_id'	        => 'required',
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
             'enddate'	        => 'required', 
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
        elseif ($request->gender==('Laki-Laki')) {
            $gender1 = ('1');
        }
  
        switch ($request->reductiontypecode) {
            case 'SUBSIDIARY50': $reductiontypeid1 = ('321');
            break;
            case 'SUBSIDIARY75': $reductiontypeid1 = ('263');
            break;
        }
        $currentTime = Carbon::now();
        $blog = MemberReduksi::create([
            
            'nipp'              => $request->nipp.'KAWISTA',
            'user_id'	        => $request->user_id,
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
     //   dd($blog);
        $callbacksave = EmployeeModel::whereUserId($request->user_id)->update([
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
            CURLOPT_URL => 'http://memsvc-rts40.kai.id:8001/rtsng_reduction/add_member_ap',
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
            // return back()->with('alert', 'Data Member Telah DiProses!');
            return redirect()->route('MemberInputReduksi.index')->with('alert', 'Data Member Telah DiProses!');
            //return "Succes!";
        } else {
            return back()->with('alert', 'Proses Data Gagal!');
        }
    }
    /*public function edit($id)
    {   
        $blog = EmployeeModel::whereUserId($id)->first();
        /*$blog = EmployeeModel::join('users', 'employee_details.user_id', '=', 'employees.user_id')
        ->join('employee_details', 'employee_details.user_id', '=', 'employees.user_id')
        ->get(['employees.tanggal_lahir', 'users.email', 'employee_details.address1'])
        ->where($id)->first();
        // return $blog;
        return view('MemberReduksi.FrmInputMemberReduksi', compact('blog'));
    } */
    public function edit($id)
    {
        $blog = EmployeeModel::whereUserId($id)->first();
        // return $blog;
        return view('MemberReduksi.FrmInputMemberReduksi', compact('blog'));
    }

    public function create()
    {
        return view('MemberReduksi.FrmInputMemberReduksi');
    }
    public function show()
    {
        return view('MemberReduksi.FrmInputMemberReduksi');
    }
}

