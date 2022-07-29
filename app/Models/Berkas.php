<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $table = 'employee_details';
    protected $fillable = [
        'user_id', 'berkas_kk', 'ktp','ijazah', 'status_berkas'
    ];
}
