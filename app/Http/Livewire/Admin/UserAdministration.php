<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserAdministration extends Component
{
    public function render()
    {
        return view('livewire.admin.user-administration');
    }

    public function destroy($id)
    {
        // dd($id);
        User::find($id)->delete();
        session()->flash('message', 'User deleted.');

        return redirect()->route('admin.users');
    }


}
