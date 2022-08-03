<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPelayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->string('keluhan');
            $table->string('diagnosa')->nullable();
            $table->string('total')->nullable()->default('0');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('pasien_id')->constrained();
            $table->string('amc');
            $table->boolean('verifikasi')->nullable()->default(false);
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
        Schema::dropIfExists('riwayat_pelayanans');
    }
}
