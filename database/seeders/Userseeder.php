<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "Administrasi",
            "username" => "administrasi",
            "password" => bcrypt('123456'),
            "role" => "administrasi",
            "nomer_tlpn" => "0896726478264",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
        User::create([
            "nama" => "Apoteker",
            "username" => "apoteker",
            "password" => bcrypt('123456'),
            "nomer_tlpn" => "0896728274",
            "role" => "apoteker",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);

        User::create([
            "nama" => "Manager",
            "username" => "manager",
            "password" => bcrypt('123456'),
            "nomer_tlpn" => "089672884033",
            "role" => "manager",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
        User::create([
            "nama" => "kasir",
            "username" => "kasir",
            "password" => bcrypt('123456'),
            "nomer_tlpn" => "089673434334",
            "role" => "kasir",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
    }
}
