<?php

namespace App\Http\Livewire\Employee;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\User;

class InfoUltah extends Component
{
    public $employees;

    public function mount()
    {
        $this->employees = User::leftJoin('employees','employees.user_id','users.id')
            ->leftJoin('positions','positions.user_id','users.id')
            ->select('users.id as user_id','employees.tanggal_lahir','employees.nama as nama','positions.name as position_name','users.active')
            ->whereMonth('tanggal_lahir', Carbon::now()->month)
            ->where('users.active',true)
            ->orderByRaw('DAY(tanggal_lahir)')
            ->get();
    }
    public function render()
    {
        return view('livewire.employee.info-ultah');
    }
}
