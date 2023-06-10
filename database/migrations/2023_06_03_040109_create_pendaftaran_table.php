<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pendaftar');
            $table->date('tgl_lahir');
            $table->string('no_hp');
            $table->string('jenjang_sekolah');
            $table->string('jenis_kelas');
            $table->string('alamat_rumah');
            $table->string('nama_ortu');
            $table->string('no_rekening');
            $table->string('atas_nama');
            $table->string('bukti_transfer');
            $table->integer('status');
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
        Schema::dropIfExists('pendaftaran');
    }
}
