<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFamily extends Model
{
    protected $fillable = [
            'nip',
            'nik',
            'hubungan',
            'name',
            'birthday_place',
            'birthday',
            'npwp'
    ];

    use HasFactory;
}
