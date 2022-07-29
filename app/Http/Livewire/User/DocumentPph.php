<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Employee;
use App\Models\UserFamily;
use App\Models\UserAddress;
use Illuminate\Support\Str;

class DocumentPph extends Component
{
    public $name;
    public $status;
    public $terms;
    public $address ='';
    public $nik;
    public $nip;
    public $pasangan;
    public $anak;

    public function mount($nip)
    {
        $employee = Employee::where('nip',$nip)->first();
        $this->name = Str::upper($employee->name) ;
        $this->npwp = $employee->npwp;
        $this->status = Str::upper($employee->status);
        $this->terms = Str::upper($employee->terms);
        $this->nik = $employee->nik;
        $this->nik = $employee->nip;

        $useraddress = UserAddress::where('nip',$nip)->first();
        $this->address = Str::upper($useraddress->address);

        $this->userfamilies = UserFamily::where('nip',$nip)->get();

        $this->pasangan = UserFamily::where('nip',$nip)
            ->where(function ($query) {
                $query->where('hubungan', 'Suami')
                ->orWhere('hubungan', 'Istri');
                })
            ->count();
        $this->anak = UserFamily::where('nip',$nip)
            ->where('hubungan', 'Anak')
            ->count();

    }
    public function render()
    {
        return view('livewire.user.document-pph');
    }
}
