<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->integer("total_bayar")->after("sub_total");
            $table->integer("kembalian")->after("total_bayar");
            $table->integer("kurang")->after("kembalian");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropColumn("total_bayar");
            $table->dropColumn("kembalian");
            $table->dropColumn("kurang");
        });
    }
}
