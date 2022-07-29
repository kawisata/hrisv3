<?php

namespace App\Models;

use App\Http\Livewire\Admin\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPosition extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function position()
    {
        return $this->belongsTo(Employee::class, 'nip','nip');
    }

    public function positionName()
    {
        return $this->hasOne(Position::class, 'position_id','id');
    }

}
