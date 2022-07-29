<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;


    // protected function tanggalLahir(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) => Carbon::parse(($value)->format('d/m/Y')),
    //         set: fn ($value) => Carbon::createFromFormat('d/m/Y', $value->format('Y-m-d')),
    //     );
    // }
    protected $fillable = [
        'user_id',
        'nama',
        'gelar',
        'tempat_lahir',
        'tanggal_lahir',
        'tmt_kerja',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // public function positionName()
    // {

    // return $this->hasOneThrough(
    //     EmployeePosition::class,
    //     Position::class,
    //     'name', // Foreign key on the positions table
    //     'position_id', // Foreign key on the position table
    //     'nip', // Local key on the vehicles table
    //     'id', // Local key on the drivers table
    //     'nip',
    //     'nip',
    // );

    // }

    public function employeeDetail()
    {
        return $this->hasOne(EmployeeDetail::class, 'user_id','user_id');
    }

    protected $casts = ['tgl_nikah' => 'tgl_nikah'];

    public function getTglNikahAttribute()
    {
        return $this->tgl_nikah->format('d/m/Y');
    }


}
