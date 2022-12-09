<?php

namespace App\Http\Livewire\Admin;

use App\Imports\EmployeeDetailImport;
use App\Models\Oncycle;
use Livewire\Component;
use App\Models\Offcycle;
use Livewire\WithFileUploads;
use App\Imports\OncycleImport;
use App\Imports\OffcycleImport;
use Throwable;

class EmployeeUpdate extends Component
{

    use WithFileUploads;
    public $salary;
    public $salaryoffcycle;
    public $employee;
    public $month, $year;

    public function render()
    {

        // $this->oncycle = Oncycle::where('month', $this->month)
        //     ->where('year', $this->year)
        //     ->count();
        // $this->oncycle_thp = Oncycle::where('month', $this->month)
        //     ->where('year', $this->year)
        //     ->sum('thp');

        // $this->offcycle = Offcycle::where('month', $this->month)
        //     ->where('year', $this->year)
        //     ->count();
        // $this->offcycle_thp = Offcycle::where('month', $this->month)
        //     ->where('year', $this->year)
        //     ->sum('thp');

        // dd($this->thp);
        return view('livewire.admin.employee-update');
    }

    public function saveEmployee()
    {
        $this->validate(
            [
                'employee'      => 'required',
            ]
        );
        (new EmployeeDetailImport)->import($this->employee, null, \Maatwebsite\Excel\Excel::XLSX);
        session()->flash('message', 'Data Pekerja Updated.');
        return redirect()->to('superadmin/employee-update');
	}
}
