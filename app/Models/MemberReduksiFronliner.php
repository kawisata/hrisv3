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
        'nip','name','birthday','nik','kelamin', 'status','email', 'status_member','startdate','enddate' ];

    function user() {
        return $this->hasOne(UserFrontliner::class, 'id', 'employee_id');
        }
    function frontlineraddress() {
        return $this->hasOne(FrontlinerAddress::class, 'employee_id', 'id');
    }
}


