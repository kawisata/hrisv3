<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Mailbox;
use Livewire\Component;
use App\Models\Position;
use App\Models\Receiver;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class UserAdmin extends Component
{
    use WithPagination, Actions;

    public $search = '';

    protected $listeners = [
        'search'=>'searching',
        'userUpdate' => '$refresh',
        'userAdded' => '$refresh',
        ];

    protected $queryString = [
        'search'
    ];

    public function loadNota()
    {
        sleep(1);
        $this->title = "Data Pekerja";
    }
    public function searching($search)
    {
        $this->resetPage();
        $this->search = $search;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::leftjoin('positions','positions.user_id','users.id')
            ->select('positions.name as position_name', 'users.name as user_name','users.id as user_id','users.email as email','users.active as active')
            ->where(function($query) {
                $query  ->where('users.name','like', '%' . $this->search . '%')
                        ->orWhere('positions.name', 'like', '%' . $this->search . '%')
                        ->orWhere('users.id','like', '%' . $this->search . '%');
                })
            ->paginate(12);
            // dd($users);
        return view('livewire.admin.user-admin', compact('users'));
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
    }
}
