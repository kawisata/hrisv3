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
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\MailboxTrait\WithOrder;
use phpDocumentor\Reflection\PseudoTypes\True_;
use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Livewire\MailboxTrait\WithUpdating;
use App\Http\Livewire\MailboxTrait\WithApproving;
use App\Http\Livewire\MailboxTrait\WithNumbering;

class UserAdminEditModal extends ModalComponent
{
    use PasswordValidationRules;
    public  $name,
            $email,
            $user_id,
            $active,
            $password;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->active = $user->active;


    }
    public function render()
    {
        $this->users = User::all();
        $this->positions = Position::where('user_id', null)
            ->where('type', 1)
            ->get();
        return view('livewire.admin.user-admin-edit-modal');
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
        dd('ini');
       $validatedData = Validator::make(
            [
                'id'    => $this->user_id,
                'name'  => $this->name,
                'email' => $this->email,
                'active' => $this->active,
                'password' => $this->passwordRules(),
            ],
            [
                'id'    => 'required|max:20',
                'name' => 'required|max:255',
                'email' => 'required|email',
                'active' => 'required',
            ],
        )->validate();

        // dd($validatedData);

        $user = User::updateOrCreate(['id' => $this->user->id],$validatedData);

        if($this->password){
            $user->forceFill([
                'password' => Hash::make($this->password),
            ])->save();
        }

        $this->emit('userUpdate');
        $this->closeModal();
    }

    public function standardPassword()
    {
        $this->password = 'StdPwdKAP2022';
    }
}
