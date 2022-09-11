<?php

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPresencesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_presences', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Event::class)->constrained();
			$table->foreignIdFor(User::class)->nullable();
			$table->dateTime('presence_at');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('event_presences');
	}
}
