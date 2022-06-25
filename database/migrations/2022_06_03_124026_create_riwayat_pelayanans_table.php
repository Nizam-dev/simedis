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
            $table->string('diagnosa');
            $table->string('total')->nullable()->default('0');
            $table->string('pembayaran')->nullable()->default('0');
            $table->foreignId('pasien_id')->constrained();
            $table->foreignId('produk_id')->constrained()->nullable();;
            $table->foreignId('penanganan_id')->constrained()->nullable();;
            $table->foreignId('user_id')->constrained();
            $table->string('amc');
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
