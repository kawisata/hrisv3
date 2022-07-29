<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegDistrict extends Model
{
    use HasFactory;

    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'districts','id');
    }


}
