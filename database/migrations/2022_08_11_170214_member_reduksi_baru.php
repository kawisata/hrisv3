<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MemberReduksiBaru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_reduksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nipp');
            $table->string('name');
            $table->date('birthofdate')->nullable();
            $table->string('phonenumber');
            $table->string('gender');
            $table->string('address');
            $table->string('reductiontypecode');
            $table->string('reductiontypeid');
            $table->string('cityid');
            $table->string('idnum');
            $table->date('requestdate')->nullable();
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
            $table->integer('duration');
            $table->string('email');
            $table->string('idtype');
            $table->string('employeetype');
            $table->string('code')->default('11');
            $table->string('message')->nullable();
            $table->string('token')->nullable();
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
        //
    }
}
