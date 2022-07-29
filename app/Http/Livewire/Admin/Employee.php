<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\EmployeesImport;
use App\Models\Employee as ModelsEmployee;
use Maatwebsite\Excel\Facades\Excel;

class Employee extends Component
{
     use WithFileUploads;
    public $importFile;

    public function render()
    {
        $this->personal_data = ModelsEmployee::all();
        return view('livewire.admin.employee');
    }

    public function import()
    {
        // dd($this->importFile);
        Excel::import(new EmployeesImport(), $this->importFile);
        // dd($request);


        return redirect()->to('employees');
    }

}
