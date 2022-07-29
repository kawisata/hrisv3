<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Employee;
use App\Models\EmployeeDetail;
use App\Models\RegRegency;
use App\Models\RegVillage;
use App\Models\UserFamily;
use App\Models\RegDistrict;
use App\Models\RegProvince;
use App\Models\UserAddress;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class EmployeeAddress extends Component
{

    public $address1;

    public $provinces;
    public $province;
    public $regencies;
    public $regency;
    public $districts;
    public $villages;

    public $selectedProvince = NULL;
    public $selectedRegency = NULL;
    public $selectedDistrict = NULL;
    public $selectedVillage = NULL;

    public function mount()
    {
        $employee = Employee::with('employeeDetail')->where('user_id',auth()->user()->id)->first();
        $this->address1 = $employee->employeeDetail->address1;
        $this->selectedProvince = $employee->employeeDetail->provinces;
        $this->selectedDistrict = $employee->employeeDetail->districts;
        $this->selectedRegency = $employee->employeeDetail->regencies;
        $this->selectedVillage = $employee->employeeDetail->villages;

        // dd($employee);

        $this->provinces    = RegProvince::all();
        $this->regencies    = collect();
        $this->villages     = collect();

        $this->districts = RegDistrict::where('regency_id', $employee->employeeDetail->regencies)->get();
        $this->regencies = RegRegency::where('province_id', $employee->employeeDetail->provinces)->get();
        $this->villages = RegVillage::where('district_id', $employee->employeeDetail->districts)->get();

    }

    public function render()
    {
        return view('livewire.user.employee-address');
    }

    public function update()
    {
        $this->validate([
            'address1'          =>  'required',
            'selectedProvince'         =>  'required',
            'selectedRegency'         =>  'required',
            'selectedDistrict'         =>  'required',
            'selectedVillage'          =>  'required',
        ],
        [
            'address1.required'  =>  'Alamat wajib diisi',
            'selectedProvince.required'     =>  'Provinsi wajib diisi',
            'selectedRegency.required'      =>  'Kota/Kabupaten wajib diisi',
            'selectedDistrict.required'     =>  'Kecamatan wajib diisi',
            'selectedVillage.required'      =>  'Desa/Kelurahan wajib diisi',
        ]        );


        EmployeeDetail::updateOrCreate(['user_id'=>auth()->user()->id],[
            'address1'      =>  $this->address1,
            'provinces'         =>  $this->selectedProvince,
            'regencies'         =>  $this->selectedRegency,
            'districts'         =>  $this->selectedDistrict,
            'villages'          =>  $this->selectedVillage,        ]);

        session()->flash('message', 'Alamat berhasil dilengkapi.');
    }

    public function updatedSelectedProvince($province)
    {
        if (!is_null($province)) {
            $this->regencies = RegRegency::where('province_id', $province)->get();
        }
    }

    public function updatedSelectedRegency($regency)
    {
        if (!is_null($regency)) {
            $this->districts = RegDistrict::where('regency_id', $regency)->get();
        }
    }

    public function updatedSelectedDistrict($district)
    {
        if (!is_null($district)) {
            $this->villages = RegVillage::where('district_id', $district)->get();
        }
    }
}
