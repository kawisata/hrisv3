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
        $users = User::with('positions')
            ->where(function($query) {
                $query  ->where('name','like', '%' . $this->search . '%')
                        ->orWhere('id','like', '%' . $this->search . '%');
                })
            ->paginate(25);
        return view('livewire.admin.user-admin', compact('users'));
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
    }
}
