<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        Organization::create(['name' => 'Perguruan Tinggi']);
        Organization::create(['name' => 'Komunitas']);
        Organization::create(['name' => 'Media']);
        Organization::create(['name' => 'Bisnis / UMKM']);
        Organization::create(['name' => 'Instansi']);
        Organization::create(['name' => 'Lainnya']);
    }
}