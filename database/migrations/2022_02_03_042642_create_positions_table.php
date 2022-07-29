<?php

use App\Models\User;
use App\Models\Group;
use App\Models\Employee;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->string('id',8)->primary()->unique();
            $table->string('name');
            $table->string('alias');
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Group::class)->nullable();
            $table->string('grade',6);
            $table->tinyInteger('hierarchy');
            $table->tinyInteger('type')->default(1);
            $table->string('unit',100);
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
        Schema::dropIfExists('positions');
    }
}
