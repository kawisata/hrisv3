<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallbackInfo extends Model
{
    use HasFactory;
    protected $table = 'callback_info';
    protected $fillable = [
        'request_date','code','message', 'nipp'
    ];
}
