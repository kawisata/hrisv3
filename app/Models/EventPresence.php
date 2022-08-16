<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPresence extends Model
{
	protected $guarded = [];
	use HasFactory;

	public function event_photos() 
	{
		return $this->hasMany(EventPhoto::class);
	}

	public function event() 
	{
		return $this->belongsTo(Event::class);
	}
}
