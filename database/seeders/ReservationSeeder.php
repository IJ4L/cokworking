<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        $reservations = [];
        
        for ($i = 1; $i <= 50; $i++) {
            $roomId = rand(1, 3); 
            $organisationId = $this->getRandomOrganisation(); 
            $startTimeHour = rand(8, 17);
            $endTimeHour = $startTimeHour + 1;
            $reservations[] = [
                'room_id' => $roomId,
                'date' => Carbon::now()->addDays(rand(0, 30))->format('Y-m-d'), // Aca
                'start_time' => sprintf('%02d:00:00', $startTimeHour),
                'end_time' => sprintf('%02d:00:00', $endTimeHour),
                'full_name' => 'User ' . $i,
                'whatsapp' => '08' . str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'organisation' => $organisationId, 
                'email' => 'user' . $i . '@example.com',
                'organization_id' => $organisationId, 
            ];
        }

        Reservation::insert($reservations);
    }

    private function getRandomOrganisation()
    {
        $organisations = ['1', '2', '3', '4', '5']; 
        return $organisations[array_rand($organisations)];
    }
}