<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BerkasKontrakKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Berkas_Kontrak_Kerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('no_urut_kontrak');
            $table->string('no_kontrak');
            $table->string('berkas_kontrak');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('upah_pokok');
            $table->string('tunjangan_kesetaraan');
            $table->string('tunjangan_profesional');
            $table->string('tunjangan_tidak_tetap_pktw');
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
