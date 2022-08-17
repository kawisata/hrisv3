<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberReduksiFronliner extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'employees';
    protected $fillable = [
        'nip','name','birthday','nik','kelamin' ];

    function frontlinerusers() {
        return $this->hasOne(FrontlinerUsers::class, 'nip', 'nip');
    }
    
    function frontlineraddress() {
        return $this->hasOne(FrontlinerAddress::class, 'nip', 'nip');
    }
}
