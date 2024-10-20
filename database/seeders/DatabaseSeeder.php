<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Memanggil seeder lainnya di sini
        $this->call([
            // Daftar seeder yang ingin Anda panggil
            OrganizationSeeder::class,
            RoomSeeder::class,
            ReservationSeeder::class,
            // Tambahkan seeder lainnya sesuai kebutuhan
        ]);
    }
}