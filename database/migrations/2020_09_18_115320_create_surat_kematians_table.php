<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKematiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_kematians', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('tempat');
            $table->string('penyebab');
            $table->unsignedBigInteger('terlapor_id');
            $table->unsignedBigInteger('kependudukan_id');
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
        Schema::dropIfExists('surat_kematians');
    }
}
