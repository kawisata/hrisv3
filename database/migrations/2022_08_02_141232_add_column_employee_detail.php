<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnEmployeeDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_details', function (Blueprint $table) {
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
            $table->string('status_member');
            $table->string('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_details', function (Blueprint $table) {
            //
        });
    }
}
