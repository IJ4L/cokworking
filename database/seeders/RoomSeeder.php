<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        // Data untuk 3 ruangan
        $rooms = [
            [
                'name' => 'Room A',
                'capacity' => 25,
                'description' => 'Ruangan kecil untuk pertemuan hingga 25 orang.',
            ],
            [
                'name' => 'Room B',
                'capacity' => 60,
                'description' => 'Ruangan sedang untuk pertemuan hingga 60 orang.',
            ],
            [
                'name' => 'Room C',
                'capacity' => 15,
                'description' => 'Ruangan besar untuk pertemuan hingga 15 orang.',
            ],
        ];

        // Insert data ke database
        Room::insert($rooms);
    }
}