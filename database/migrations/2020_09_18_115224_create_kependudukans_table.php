<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKependudukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('noSurat')->unique();
            $table->date('tanggal_masuk');
            $table->string('hubungan');
            $table->unsignedBigInteger('pelapor_id');
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
        Schema::dropIfExists('kependudukans');
    }
}
