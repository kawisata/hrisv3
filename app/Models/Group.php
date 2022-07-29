<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $with = ['groupmembers'];

    public function groupmembers()
    {
        return $this->hasMany(GroupMember::class);
    }

    public function groupmember()
    {
        return $this->hasOne(GroupMember::class)->where('position_id', auth()->user()->position->id);
    }

}
