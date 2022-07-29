<?php

namespace App\Http\Livewire\Admin;

use App\Models\Position;
use App\Models\User;
use Livewire\Component;

class Mutation extends Component
{
    public $user, $user_id, $name, $nip, $email;
    public $position_id, $position, $position_name, $alias, $unit;
    public $new_position_id;
    protected $queryString = [
        'position_id' => ['except' => ''],
    ];

    public function mount($position_id)
    {
        $position = Position::where('id',$position_id)->first();

            $this->position_name    =   $position->name;
            $this->position_id      =   $position->id;
            $this->alias            =   $position->alias;
            $this->unit             =   $position->unit;
            $this->user_id          =   $position->user_id;
    }

    public function render()
    {
        $this->positions = Position::all();
        $this->users = User::all();


        return view('livewire.admin.mutation');
    }


    public function updatePosition()
    {
        // dd(Position::where('id',$this->position_id)->first());
        Position::where('id',$this->position_id)->update([
            'user_id' => $this->user_id,
        ]);

    }


}
