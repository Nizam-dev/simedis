<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_dokters', function (Blueprint $table) {
            $table->id();
            $table->boolean('Senin')->nullable()->default(false);
            $table->boolean('Selasa')->nullable()->default(false);
            $table->boolean('Rabu')->nullable()->default(false);
            $table->boolean('Kamis')->nullable()->default(false);
            $table->boolean('Jumat')->nullable()->default(false);
            $table->boolean('Sabtu')->nullable()->default(false);
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('jadwal_dokters');
    }
}
