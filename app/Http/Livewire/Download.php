<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Download extends Component
{
    public function render()
    {
        return view('livewire.download');
    }

    public function export()
    {
        return response()->download(storage_path('akhlak/Buku_Saku_Akhlak.pdf'));
    }
}
