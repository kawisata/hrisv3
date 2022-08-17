<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontlinerAddress extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'user_addresses';
    protected $fillable = [
        'address' ,'nip' ];
}
