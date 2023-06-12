<?php

namespace App\Http\Livewire\Admin;

use App\Models\Mailbox;
use App\Models\Position;
use App\Models\Receiver;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class PositionAdmin extends Component
{
    use WithPagination, Actions;

    public $search = '';

    protected $listeners = [
        'search'=>'searching',
        'positionUpdate' => '$refresh',
        'positionAdded' => '$refresh',
        ];

    protected $queryString = [
        'search',
    ];

    public function loadNota()
    {
        sleep(1);
        $this->title = "Mutasi Jabatan";
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
        $positions = Position::where('type',1)
            ->leftJoin('users', 'users.id', 'user_id')
            ->select('positions.*')
            ->where(function($query) {
                $query->where('positions.name','like', '%' . $this->search . '%')
                    ->orWhere('users.name', 'like', '%' . $this->search . '%')
                      ->orWhere('alias','like', '%' . $this->search . '%')
                      ->orWhere('user_id','like', '%' . $this->search . '%');
            })
            ->orderBy('hierarchy')
            ->paginate(10);
        return view('livewire.admin.position-admin', compact('positions'));
    }

    public function deletePosition($id)
    {
        $mailboxes = Mailbox::where('position_id',$id)->exists();
        $receivers = Receiver::where('position_id',$id)->exists();
        if($mailboxes){
            $this->notification()->error(
            $title = 'Posisi',
            $description = 'Posisi tidak dapat dihapus karena telah digunakan'
            );
            return redirect()->back();
        }
        Position::find($id)->delete();
    }
}


