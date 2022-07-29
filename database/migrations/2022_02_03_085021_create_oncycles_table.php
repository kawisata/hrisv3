<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOncyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oncycles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('uuid');
            $table->string('oncycle_id',16);
            $table->string('nama',40);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('jabatan',40);
            $table->string('bank',15);
            $table->string('rekening',17);
            $table->string('upah_pokok',10);
            $table->string('pkwt',10)->nullable();
            $table->string('bpjs_base',10)->nullable();
            $table->string('perumahan',10)->nullable();
            $table->string('t_admin_bank',10)->nullable();
            $table->string('t_direksi',10)->nullable();
            $table->string('t_komisaris',10)->nullable();
            $table->string('t_perumahan_direksi',10)->nullable();
            $table->string('t_transport_komisaris',10)->nullable();
            $table->string('t_kurang_bayar',10)->nullable();
            $table->string('tht',10)->nullable();
            $table->string('jht_ajs',10)->nullable();
            $table->string('jht_ajs_p',10)->nullable();
            $table->string('jht',10)->nullable();
            $table->string('jht_p',10)->nullable();
            $table->string('jp',10)->nullable();
            $table->string('jp_p',10)->nullable();
            $table->string('jkk',10)->nullable();
            $table->string('jk',10)->nullable();
            $table->string('jpk_kawis',10)->nullable();
            $table->string('jpk_p_kawis',10)->nullable();
            $table->string('jpk',10)->nullable();
            $table->string('jpk_p',10)->nullable();
            $table->string('jpk_uk',10)->nullable();
            $table->string('jpk_pens',10)->nullable();
            $table->string('jpk_pens_p',10)->nullable();
            $table->string('spka',10)->nullable();
            $table->string('potongan_lain',10)->nullable();
            $table->string('sewa_rumah_dinas',10)->nullable();
            $table->string('sewa_mes',10)->nullable();
            $table->string('simp_baituridho',10)->nullable();
            $table->string('cic_baituridho',10)->nullable();
            $table->string('potongan_k_bayar',10)->nullable();
            $table->string('pajak',10)->nullable();
            $table->string('npwp',21)->nullable();
            $table->string('admin_bank',10)->nullable();
            $table->string('thp',10)->nullable();
            $table->string('t_penerimaan',10)->nullable();
            $table->string('t_potongan',10)->nullable();
            $table->string('month',2);
            $table->string('year',4);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oncycles');
    }
}
