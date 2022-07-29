<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    use HasFactory;

    public function positionName()
    {
        return $this->hasOne(Position::class,'id','position_id');
    }


}
