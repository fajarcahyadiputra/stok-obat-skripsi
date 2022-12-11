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
            "nama" => "admin",
            "username" => "admin",
            "password" => bcrypt('123456'),
            "role" => "admin",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
        User::create([
            "nama" => "apoteker",
            "username" => "apoteker",
            "password" => bcrypt('123456'),
            "role" => "apoteker",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);

        User::create([
            "nama" => "apoteker",
            "username" => "manager",
            "password" => bcrypt('123456'),
            "role" => "manager",
            "status_aktif" => "aktif",
            "avatar" => "",
        ]);
    }
}
