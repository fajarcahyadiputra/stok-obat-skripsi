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
            $table->string('nama', 50);
            $table->string('username', 100);
            $table->string('password', 200);
            $table->enum('role', ['admin', 'apoteker', 'manager','kasir'])->default('apoteker');
            $table->enum('status_aktif', ['aktif', 'tidak'])->default('aktif');
            $table->string('nomer_tlpn', 15)->nullable();
            $table->string('avatar', 100)->nullable();
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
        Schema::dropIfExists('users');
    }
}
