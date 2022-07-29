<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\EmployeeDetail;
use Illuminate\Validation\Rule;

class EmployeeStatus extends Component
{

    public $nama;
    public $nik;
    public $nip;
    public $npwp;
    public $kelamin;
    public $bpjs;
    public $bpjs_kes;
    public $agama;
    public $nikah;
    public $tgl_nikah;
    public $gelar;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $phone;
    public $updated_at;
    public $employeedetailID;
    public $year, $month, $day;
    public $yeare, $monthe, $daye;

    public function mount()
    {

        $employee = Employee::with('employeeDetail')->where('user_id',auth()->user()->id)->first();
        $this->employeedetailID = $employee->employeeDetail->id;
        $this->nama = $employee->nama;
        $this->nip = $employee->user_id;
        $this->tempat_lahir = $employee->tempat_lahir;
        $this->tanggal_lahir = Carbon::parse($employee->tanggal_lahir)->format('d/m/Y');

        $this->nik = $employee->employeeDetail->nik;
        $this->kk = $employee->employeeDetail->kk;
        $this->npwp = $employee->employeeDetail->npwp;
        $this->bpjs = $employee->employeeDetail->bpjs;
        $this->bpjs_kes = $employee->employeeDetail->bpjs_kes;
        $this->agama = $employee->employeeDetail->agama;
        $this->kelamin = $employee->employeeDetail->kelamin;
        $this->tgl_nikah = Carbon::parse($employee->employeeDetail->tgl_nikah)->format('d/m/Y');
        // $this->tgl_nikah = $employee->employeeDetail->tgl_nikah;
        $this->nikah = $employee->employeeDetail->nikah;
        $this->phone = $employee->employeeDetail->phone;
        $this->day = Carbon::parse($employee->tanggal_lahir)->format('d');
        $this->month = Carbon::parse($employee->tanggal_lahir)->format('m');
        $this->year = Carbon::parse($employee->tanggal_lahir)->format('Y');

        $this->daye = Carbon::parse($employee->employeeDetail->tgl_nikah)->format('d');
        $this->monthe = Carbon::parse($employee->employeeDetail->tgl_nikah)->format('m');
        $this->yeare = Carbon::parse($employee->employeeDetail->tgl_nikah)->format('Y');

    }

    public function render()
    {
        return view('livewire.user.employee-status');
    }

    public function update()
    {
        $this->validate([
            'nama'      => 'required',
            'nik' => ['required','regex:/^(1[1-9]|21|[37][1-6]|5[1-3]|6[1-5]|[89][12])\d{2}\d{2}([04][1-9]|[1256][0-9]|[37][01])(0[1-9]|1[0-2])\d{2}\d{4}$/u', Rule::unique('employee_details')->ignore($this->employeedetailID)] ,
            'kk' => ['required','regex:/^(1[1-9]|21|[37][1-6]|5[1-3]|6[1-5]|[89][12])\d{2}\d{2}([04][1-9]|[1256][0-9]|[37][01])(0[1-9]|1[0-2])\d{2}\d{4}$/u', Rule::unique('employee_details')->ignore($this->employeedetailID)] ,
            'npwp'          =>  'required',
            'bpjs'          =>  'required',
            'agama'          =>  'required',
            'kelamin'          =>  'required',
            'nikah'          =>  'required',
            'phone'          =>  'required',
            'day'          =>  'required',
            'month'          =>  'required',
            'year'          =>  'required',
            'daye'          =>  'required',
            'monthe'          =>  'required',
            'yeare'          =>  'required',
            'tanggal_lahir'          =>  'required',
        ]
        );


        Employee::updateOrCreate(['user_id'=>auth()->user()->id],[
            'nama'      =>  $this->nama,
            'tempat_lahir'    =>  $this->tempat_lahir,
            'tanggal_lahir'     =>  $this->year . '/' . $this->month . '/' . $this->day,
            // 'tanggal_lahir'     =>  Carbon::createFromFormat('d/m/Y', $this->tanggal_lahir)->format('Y-m-d'),
        ]);

        EmployeeDetail::updateOrCreate(['user_id'=>auth()->user()->id],[
            'nik'      =>  $this->nik,
            'kk'      =>  $this->kk,
            'npwp'      =>  $this->npwp,
            'bpjs'      =>  $this->bpjs,
            'bpjs_kes'      =>  $this->bpjs_kes,
            'agama'      =>  $this->agama,
            'kelamin'      =>  $this->kelamin,
            'nikah'      =>  $this->nikah,
            'tgl_nikah'      =>   $this->yeare . '/' . $this->monthe . '/' . $this->daye,
            'phone'      =>  $this->phone,
        ]);

        session()->flash('message', 'Biodata Pribadi berhasil dilengkapi.');

    }
}
