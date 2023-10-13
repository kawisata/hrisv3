<?php

namespace App\Http\Livewire\Admin;

use App\Models\Mailbox;
use Livewire\Component;
use App\Models\Position;
use App\Models\Receiver;
use App\Models\Corrector;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\MailboxTrait\WithOrder;
use phpDocumentor\Reflection\PseudoTypes\True_;
use App\Http\Livewire\MailboxTrait\WithUpdating;
use App\Http\Livewire\MailboxTrait\WithApproving;
use App\Http\Livewire\MailboxTrait\WithNumbering;
use App\Models\Attachment;
use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use PHPUnit\TextUI\XmlConfiguration\Groups;
use Symfony\Contracts\Service\Attribute\Required;

class PositionAdminCreateModal extends ModalComponent
{
    public $name,
            $alias,
            $group_id,
            $user_id,
            $grade,
            $unit,
            $type,
            $head_unit,
            $assistant_id,
            $hierarchy,
            $active,
            $positionid;


    public function render()
    {

        return view('livewire.admin.position-admin-create-modal',([
            'users' => User::all(),
            'assistants' => Position::all(),
            'groups'=>Group::all()
            ]
        ));
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
                'id'    => $this->positionid,
                'name' => $this->name,
                'alias' => $this->alias,
                'group_id' => $this->group_id,
                'user_id' => $this->user_id,
                'grade' => $this->grade,
                'unit' => $this->unit,
                'type' => $this->type,
                'head_unit' => $this->head_unit,
                'assistant_id' => $this->assistant_id,
                'hierarchy' => $this->hierarchy,
                'active' => $this->active,
            ],
            [
                'id'    =>  'required|max:9',
                'name' => 'required|max:255',
                'alias' => 'required|max:255',
                'user_id' => 'nullable|max:20',
                'grade' => 'nullable|max:6',
                'grup_id' => 'required_id:type,2',
                'hierarchy' => 'required|max:4',
                'type' => 'required|max:4',
                'unit' => 'nullable|max:100',
                'head_unit' => 'nullable|max:10',
                'assistant_id' => 'nullable|max:8',
                'active' => 'required|max:1',
            ],
        )->validate();

        Position::create($validatedData);

            $this->emit('positionadded');
            $this->closeModal();
    }


}
