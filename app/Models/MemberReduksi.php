<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberReduksi extends Model
{
    use HasFactory;
    protected $table = 'member_reduksi_pegawai';
    protected $fillable = [
        'user_id','nipp','name','birthofdate','phonenumber','gender','address','reductiontypecode',
        'reductiontypeid','cityid','idnum','requestdate','startdate','enddate','duration',
        'email','idtype','employeetype','token' ];
}




            