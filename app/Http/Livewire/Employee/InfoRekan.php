<?php

namespace App\Http\Livewire\Employee;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;

class InfoRekan extends Component
{
    use WithPagination;
    public $search;

    public function mount()
    {

        // $this->employees = User::with(['employee','position'])->get();

    }
    public function render()
    {

        $search = $this->search;
        $employees = User::leftJoin('employees','employees.user_id','users.id')
            ->leftJoin('positions','positions.user_id','users.id')
            ->select('users.id as user_id','employees.tanggal_lahir','employees.nama as nama','positions.alias as position_name')
            ->where(function ($query) use($search) {
                    $query->where('employees.nama', 'like', '%' . $search . '%')
                    ->orWhere('positions.name', 'like', '%' . $search . '%')
                    ->orWhere('users.id', 'like', '%' . $search . '%');
                })
            ->paginate(25);
        return view('livewire.employee.info-rekan', compact('employees'));
    }

    protected $queryString = [
        'search',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
