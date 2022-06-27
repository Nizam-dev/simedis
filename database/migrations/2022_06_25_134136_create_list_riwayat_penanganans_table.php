<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListRiwayatPenanganansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_riwayat_penanganans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_pelayanan_id')->constrained()->nullable();
            $table->foreignId('penanganan_id')->constrained();
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
        Schema::dropIfExists('list_riwayat_penanganans');
    }
}
