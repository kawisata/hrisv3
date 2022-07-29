<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Imports\UserAddressImport;
use Maatwebsite\Excel\Facades\Excel;

class UserAddressAdmin extends Component
{
    use WithFileUploads;
    public $importFile;

    public function render()
    {
        return view('livewire.admin.user-address-admin');
    }

    public function import()
    {
        Excel::import(new UserAddressImport(), $this->importFile);

        return redirect()->to('user-address');
    }
}
