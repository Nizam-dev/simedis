<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nama');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('tgl_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('foto')->nullable()->default('foto.png');
            $table->string('no_hp')->nullable();
            $table->string('kode_amc');
            $table->string('role');
            $table->string('kode_dokter')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
