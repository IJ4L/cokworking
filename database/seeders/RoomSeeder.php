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
                'capacity' => 10,
                'description' => 'Ruangan kecil untuk pertemuan hingga 10 orang.',
            ],
            [
                'name' => 'Room B',
                'capacity' => 20,
                'description' => 'Ruangan sedang untuk pertemuan hingga 20 orang.',
            ],
            [
                'name' => 'Room C',
                'capacity' => 30,
                'description' => 'Ruangan besar untuk pertemuan hingga 30 orang.',
            ],
        ];

        // Insert data ke database
        Room::insert($rooms);
    }
}