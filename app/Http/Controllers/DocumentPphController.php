<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\UserFamily;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class DocumentPphController extends Controller
{

    public function show($nik, $nip)
    {
        $employee = Employee::where('nik',$nik)
        ->where('nip', $nip)
        ->first();

        $useraddress = UserAddress::where('nip',$nip)
            ->join('reg_provinces','user_addresses.provinces','reg_provinces.id')
            ->join('reg_regencies','user_addresses.regencies','reg_regencies.id')
            ->join('reg_districts','user_addresses.districts','reg_districts.id')
            ->join('reg_villages','user_addresses.villages','reg_villages.id')
            ->select('user_addresses.*', 'reg_provinces.name as province_name',
            'reg_regencies.name as regency_name', 'reg_districts.name as district_name', 'reg_villages.name as village_name' )
            ->first();

        $userfamilies = UserFamily::where('nip',$nip)->get();

        return view('livewire.user.index-document-pph', compact(['employee','useraddress','userfamilies']));
    }

}
