<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberReduksiInputFrontliner extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'member_reduksi';
    protected $fillable = [
        'employee_id','nipp','name','birthofdate','phonenumber','gender','address','reductiontypecode',
        'reductiontypeid','cityid','idnum','requestdate','startdate','enddate','duration',
        'email','idtype','employeetype','code','message','token' ];
}
