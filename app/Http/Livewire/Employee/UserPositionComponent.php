<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\Employee;

class UserPositionComponent extends Component
{
    public function render()
    {
        $this->employee = Employee::with(['position'=> function ($query) {
            $query->with('positionName');
            }])
        ->paginate(5);

        dd($this->employee);
        return view('livewire.employee.user-position-component');
    }
}
