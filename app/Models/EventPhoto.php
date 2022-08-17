<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPhoto extends Model
{
	protected $guarded = [];
	use HasFactory;

	public function eventpresence()
	{
		return $this->belongsTo(EventPresence::class);
	}
}
