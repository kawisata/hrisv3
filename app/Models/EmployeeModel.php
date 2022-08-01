<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'employee_details';
    protected $fillable = [
        'user_id', 'berkas_kk', 'ktp','ijazah', 'status_berkas', 'nik', 'kelamin', 'address1',
        'nipp','name','birthofdate','phonenumber','gender','address','reductiontypecode',
        'reductiontypeid','cityid','idnum','requestdate','startdate','enddate','duration',
        'email','idtype','employeetype','status_member','token'
    ];

    function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    function employeeDetail() {
        return $this->hasOne(EmployeeDetail::class, 'user_id', 'user_id');
    }

    function employee() {
        return $this->hasOne(Employee::class, 'user_id', 'user_id');
    }
}
