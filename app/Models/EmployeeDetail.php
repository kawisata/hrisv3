<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{

    public $guarded = [];

    use HasFactory;

    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id','user_id');
    }

}
