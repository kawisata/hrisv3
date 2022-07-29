<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
            'nip',
            'address',
            'provinces',
            'regencies',
            'districts',
            'villages',
            'phone',
            'approved',
    ];

    use HasFactory;
}
