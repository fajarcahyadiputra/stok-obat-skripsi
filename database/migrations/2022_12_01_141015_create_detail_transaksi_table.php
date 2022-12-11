<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string("kode_obat", 50);
            $table->string("nomer_faktur");
            $table->unsignedBigInteger("satuan_id");
            $table->string("nama_obat");
            $table->integer("harga_satuan");
            $table->integer("jumlah");
            $table->timestamps();

            $table->foreign('kode_obat')->references('kode_obat')->on('obat')->onDelete('cascade');
            $table->foreign('nomer_faktur')->references('nomer_faktur')->on('transaksi')->onDelete('cascade');
            $table->foreign('satuan_id')->references('id')->on('satuan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
}
