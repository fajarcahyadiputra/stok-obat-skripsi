<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->string('kode_obat', 50)->unique();
            $table->string('nama', 200);
            $table->integer('jumlah');
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('satuan_id');
            $table->text("khasiat_obat")->nullable();
            $table->date("tanggal_kadaluarsa");
            $table->timestamps();

            $table->primary(['kode_obat']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obat');
    }
}
