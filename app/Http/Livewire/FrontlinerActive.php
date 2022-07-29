<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\EmployeeActive;
use Livewire\Component;

class FrontlinerActive extends Component
{
    public function render()
    {
        $this->pusat = Employee::count();
        $this->frontlinerActive = EmployeeActive::count();

        return view('livewire.frontliner-active');
    }
}
