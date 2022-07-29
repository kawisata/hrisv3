<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffcyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offcycles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('uuid');
            $table->string('offcycle_id',16);
            $table->string('nama',40);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('npwp',21)->nullable();
            $table->string('bank',15);
            $table->string('rekening',17);
            $table->string('transport',10);
            $table->string('komunikasi',10);
            $table->string('jabatan',10);
            $table->string('kinerja',10);
            $table->string('kemahalan',10);
            $table->string('cuti',10);
            $table->string('profesi',10);
            $table->string('pkwt',10);
            $table->string('t_potongan',10);
            $table->string('t_penerimaan',10);
            $table->string('potongan_lain',10);
            $table->string('admin_bank',10);
            $table->string('thp',10);
            $table->string('month',2);
            $table->string('year',4);
            $table->string('position',40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offcycles');
    }
}
