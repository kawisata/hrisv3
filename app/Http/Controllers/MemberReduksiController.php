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

class MemberReduksiController extends Controller
{
    public function index(Request $request)
    {
        $cari = (!empty($_GET['cari'])) ? $_GET['cari'] : "";

        $blogs = DB::table('member_reduksi');
        //->leftJoin('users', 'employee_details.user_id', '=', 'users.id');

        if ($cari) {
            $blogs=$blogs->where(function ($query) use ($cari) {
                $query->where('member_reduksi.name','like',"%".$cari."%")
                      ->orWhere('member_reduksi.nipp', 'like',"%".$cari."%");
                    });
        }

        $data['blogs']=$blogs->paginate(10);
        return view('MemberReduksi.FrmMemberReduksi', $data); 
    } 
    /*public function edit($id)
    {
        $blog = MemberReduksi::whereNipp($id)->first();
        // return $blog;
        return view('MemberReduksi.FrmUpdateMemberReduksi', compact('blog'));
    }*/
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
        elseif ($request->gender==('Laki-laki')) {
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
            'nipp'              => $request->nipp,
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
           
        ];
      // dd($arr);

        $apibody = [
            'nipp'              => $request->nipp,
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
        //    dd($apibody);
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
            "nipp": "'.$request->nipp.'",
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
            return redirect()->route('MemberReduksi.index')->with('alert', 'Data Member Telah DiProses!');
            
            //return back()->with('alert', 'Data Member Telah DiProses!');
            //return "Succes!";
        } else {
            return back()->with('alert', 'Proses Data Gagal!');
        }
    }
    
    public function edit($id)
    {
        $blog = MemberReduksi::find($id);
        //dd($blog);
        return view('MemberReduksi.FrmUpdateMemberReduksi', compact('blog'));
    }
}
