<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Group;
use App\Models\Mailbox;
use Livewire\Component;
use App\Models\Position;
use App\Models\Receiver;
use App\Models\Corrector;
use App\Models\Attachment;
use App\Models\GroupMember;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\MailboxTrait\WithOrder;
use phpDocumentor\Reflection\PseudoTypes\True_;
use App\Http\Livewire\MailboxTrait\WithUpdating;
use App\Http\Livewire\MailboxTrait\WithApproving;
use App\Http\Livewire\MailboxTrait\WithNumbering;

class GroupAdminEditModal extends ModalComponent
{
    public $group_name,
            $email,
            $position_name;
    public $search = '';

    protected $rules = [
                'group_name' => 'required|max:255',
                'email' => 'required|email',
                'position_name' => 'required|max:20',
                ];

    public function mount(Group $group)
    {
        $this->group = $group;

            $this->group_name = $group->group_name;
            $this->email         = $group->email;
            if($group->position){
                $this->position_name = $group->position->name;
            }
    }

    public function updatedGroupName()
    {
        $this->position_name = $this->group_name;
    }
    public function render()
    {
        $this->users = User::all();
        $this->assistants = Position::all();

        $members = GroupMember::where('group_id',$this->group->id)->pluck('position_id');

        $this->groupmembers = GroupMember::where('group_id',$this->group->id)
            ->with('user','position')
            ->get();

        $this->positions = DB::table('positions')->orderBy('hierarchy')
                ->leftJoin('users', 'positions.user_id','users.id')
                ->select('positions.*','users.name as user_name')
                ->orWhere(function($query) {
                    $query->where('users.name','like', '%' . $this->search . '%')
                        ->orWhere('positions.name','like', '%' . $this->search . '%')
                        ->orWhere('positions.unit','like', '%' . $this->search . '%');
                })
                ->whereNotIn('positions.id', $members)
                ->where('type',1)
                ->get();

        return view('livewire.admin.group-admin-edit-modal');
    }

    protected static array $maxWidths = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '3xl' => 'sm:max-w-3xl',
        '4xl' => 'sm:max-w-4xl',
        '5xl' => 'sm:max-w-5xl',
        '6xl' => 'sm:max-w-6xl',
        '7xl' => 'sm:max-w-7xl',
        'full' => 'sm:max-w-full',
    ];

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function close()
    {
        $this->closeModal();
    }

    public function save()
    {
       $validatedData = Validator::make(
            [
                'group_name' => $this->group_name,
                'email' => $this->email,
                'position_name' => $this->position_name,
            ],
            [
                'group_name' => 'required|max:255',
                'email' => 'required|email',
                'position_name' => 'required|max:255',
            ],
        )->validate();

        $group = Group::updateOrCreate(['id' => $this->group->id],$validatedData);

        Position::updateOrCreate(['group_id' => $this->group->id],[
            'id'      =>  $group->position->id,
            'name'          =>  $group->group_name,
            'alias'         =>  $group->group_name,
            'type'          => 2,
            'hierarchy'     =>  $group->id,
            ]);

        $this->emit('groupUpdate');
        $this->closeModal();
    }

    public function select($selectedContactId)
    {
        $group = $this->group;

            $groupmembers = $group->groupmembers()->create([
                        'position_id'   =>  $selectedContactId,
                    ]);

            $groupmembers->refresh();

        $this->search = '';
    }

    public function delete($id)
    {
        GroupMember::find($id)->delete();
    }
}
