<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Group;
use App\Models\Position;
use App\Models\GroupMember;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Validator;

class GroupAdminCreateModal extends ModalComponent
{
    public $group_name,
            $email;

    public function mount(Group $group)
    {
        $this->group = $group;
    }
    public function render()
    {
        $this->groups = Group::all();

        $allreceivers = GroupMember::where('group_id',$this->uuid)->pluck('position_id');

        $this->positions = DB::table('positions')->orderBy('hierarchy')
                ->leftJoin('users', 'positions.user_id','users.id')
                ->select('positions.*','users.name as user_name')
                ->orWhere(function($query) {
                    $query->where('users.name','like', '%' . $this->penerima . '%')
                        ->orWhere('positions.name','like', '%' . $this->penerima . '%')
                        ->orWhere('positions.unit','like', '%' . $this->penerima . '%');
                })
                ->where('positions.id','!=', $mailbox->position_id)
                ->where('positions.id','!=', auth()->user()->position->id)
                ->whereNotIn('positions.id', $allreceivers)
                ->whereNotIn('positions.id', $allcorrectors)
                ->whereNotIn('positions.id', $asname)
                ->where('type',2)
                ->get();
        return view('livewire.admin.group-admin-create-modal');
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
        return 'xl';
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
            ],
            [
                'group_name' => 'required|max:255',
                'email' => 'required|email',
            ],
        )->validate();

        Group::create($validatedData);

            $this->emit('groupadded');
            $this->closeModal();
    }


}
