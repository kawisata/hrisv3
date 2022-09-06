<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontliner extends Model
{
    use HasFactory;
    protected $table = 'frontliner';
    protected $fillable = [
        'nipp','name','birthofdate'];
}
