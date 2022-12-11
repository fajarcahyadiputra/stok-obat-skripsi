<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObattMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_obat', 50);
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('satuan_id');
            $table->integer('jumlah');
            $table->integer('jumlah_sebelumnya');
            $table->integer('total_stok');
            $table->string('penerima', 100);

            $table->foreign('kode_obat')->references('kode_obat')->on('obat')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('supplier')->onDelete('cascade');
            $table->foreign('satuan_id')->references('id')->on('satuan')->onDelete('cascade');
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
        Schema::dropIfExists('obat_masuk');
    }
}
