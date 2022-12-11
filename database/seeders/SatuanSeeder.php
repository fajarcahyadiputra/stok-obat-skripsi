<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Satuan::create([
            "satuan" => "tablet",
            "jumlah_persatuan" => 1
        ]);
        Satuan::create([
            "satuan" => "strip-10",
            "jumlah_persatuan" => 10
        ]);
        Satuan::create([
            "satuan" => "botol",
            "jumlah_persatuan" => 1
        ]);
        Satuan::create([
            "satuan" => "box",
            "jumlah_persatuan" => 12
        ]);
    }
}
