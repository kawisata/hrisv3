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

class PositionAdminModal extends ModalComponent
{
    public $name,
            $alias,
            $group_id,
            $user_id,
            $grade,
            $unit,
            $type,
            $head_unit,
            $hierarchy,
            $active,
            $positionid;

    protected $rules = [
                'name' => 'required|max:255',
                'alias' => 'required|max:255',
                'user_id' => 'nullable|max:20',
                'grade' => 'required|max:6',
                'hierarchy' => 'required|max:4',
                'type' => 'required|max:4',
                'unit' => 'required|max:100',
                'head_unit' => 'nullable|max:10',
                'active' => 'required|max:1',
                ];

    public function mount(Position $position)
    {
        $this->position = $position;

            $this->name = $position->name;
            $this->name         = $position->name;
            $this->alias        = $position->alias;
            $this->user_id      = $position->user_id;
            $this->grade        = $position->grade;
            $this->unit         = $position->unit;
            $this->type         = $position->type;
            $this->head_unit    = $position->head_unit;
            $this->hierarchy    = $position->hierarchy;
            $this->active       = $position->active;
            $this->positionid   = $position->positionid;

    }
    public function render()
    {
        $this->users = User::all();

        return view('livewire.admin.position-admin-modal');
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
        return redirect()->back('position-admin');
    }

    public function save()
    {
       $validatedData = Validator::make(
            [
                'name' => $this->name,
                'alias' => $this->alias,
                'user_id' => $this->user_id,
                'grade' => $this->grade,
                'unit' => $this->unit,
                'type' => $this->type,
                'head_unit' => $this->head_unit,
                'hierarchy' => $this->hierarchy,
                'active' => $this->active,
            ],
            [
                'name' => 'required|max:255',
                'alias' => 'required|max:255',
                'user_id' => 'nullable|max:20',
                'grade' => 'required|max:6',
                'hierarchy' => 'required|max:4',
                'type' => 'required|max:4',
                'unit' => 'required|max:100',
                'head_unit' => 'nullable|max:10',
                'active' => 'required|max:1',
            ],
        )->validate();

        Position::updateOrCreate(['id' => $this->position->id],$validatedData);

        $this->emit('positionUpdate');
        $this->closeModal();

    }

}
