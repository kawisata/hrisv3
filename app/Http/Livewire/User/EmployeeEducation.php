<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use App\Models\EmployeeDetail;

class EmployeeEducation extends Component
{
    use WithFileUploads;

    public $pendidikan;
    public $jurusan;
    public $tgl_lulus;
    public $sekolah;


    public function mount()
    {
        $employee = Employee::with('employeeDetail')->where('user_id',auth()->user()->id)->first();

        $this->pendidikan = $employee->employeeDetail->pendidikan;
        $this->jurusan = $employee->employeeDetail->jurusan;
        $this->sekolah = $employee->employeeDetail->sekolah;
        $this->tgl_lulus = Carbon::parse($employee->employeeDetail->tgl_lulus)->format('d/m/Y');

    }

    public function render()
    {
        return view('livewire.user.employee-education');
    }

    public function update()
    {
        // dd($this->name,$this->status,$this->terms);
        $this->validate([
            'pendidikan'          =>  'required',
            'jurusan'          =>  'required',
            'tgl_lulus'          =>  'required',
            'sekolah'          =>  'required',
        ]
        );

        EmployeeDetail::updateOrCreate(['user_id'=>auth()->user()->id],[
            'pendidikan'      =>  $this->pendidikan,
            'jurusan'      =>  $this->jurusan,
            'sekolah'      =>  $this->sekolah,
            'tgl_lulus'      =>  Carbon::createFromFormat('d/m/Y', $this->tgl_lulus)->format('Y-m-d'),
        ]);

        session()->flash('message', 'Data pendidikan berhasil dilengkapi.');
    }

}
