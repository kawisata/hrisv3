<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nik',16)->nullable()->unique();
            $table->string('kk',255)->nullable();
            $table->string('berkas_kk',255)->nullable();
            $table->string('ktp',255)->nullable();
            $table->string('ijazah',255)->nullable();
            $table->string('status_berkas',255)->nullable();
            $table->string('npwp',21)->nullable();
            $table->string('address1',100)->nullable();
            $table->string('address2',100)->nullable();
            $table->string('bpjs',12)->nullable();
            $table->string('bpjs_kes',16)->nullable();
            $table->string('agama',20)->nullable();
            $table->string('kelamin',9)->nullable();
            $table->string('nikah',15)->nullable();
            $table->date('tgl_nikah')->nullable();
            $table->string('emp_group',20)->nullable();
            $table->string('emp_subgroup',20)->nullable();
            $table->string('pendidikan',4)->nullable();
            $table->string('jurusan',25)->nullable();
            $table->date('tgl_lulus')->nullable();
            $table->string('sekolah',100)->nullable();
            $table->string('phone',15)->nullable();
            $table->integer('provinces')->nullable();
            $table->integer('regencies')->nullable();
            $table->integer('districts')->nullable();
            $table->integer('villages')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_details');
    }
}
