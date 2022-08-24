<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFrontliner extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'employees';
    protected $fillable = [
        'nip','name','birthday','nik','kelamin', 'status','email', 'status_member' ];
}
