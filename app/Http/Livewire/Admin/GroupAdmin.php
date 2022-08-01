<?php

namespace App\Http\Livewire\Admin;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithPagination;

class GroupAdmin extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = [
        'search'=>'searching',
        'groupUpdate' => '$refresh',
        'groupAdded' => '$refresh',
        ];

    protected $queryString = [
    ];

    public function loadNota()
    {
        sleep(1);
        $this->title = "Para";
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
        $groups = Group::where(function($query) {
                $query->where('group_name','like', '%' . $this->search . '%');
            })
            ->leftJoin('positions','positions.group_id','groups.id')
            ->select('groups.*','positions.name as position_name',)
            ->paginate(25);
        return view('livewire.admin.group-admin', compact('groups'));
    }

    public function create()
    {
        $group = Group::with('position')->create([
            'group_name'    =>   'Draft Group',
            'email'         =>   'email@email.com',
        ]);


        $this->emit("openModal", "admin.group-admin-edit-modal", ['group'=>$group->id]);
    }

    public function deleteGroup($id)
    {
        $position = Position::where('group_id',$id);
        $groupmember = GroupMember::where('group_id',$id);

        if($position->exists()){
            $position->delete();
        };

        if($groupmember->exists()){
            $groupmember->delete();
        };
        Group::find($id)->delete();
    }
}
