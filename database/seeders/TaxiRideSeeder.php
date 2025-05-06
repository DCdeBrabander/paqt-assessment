<?php

namespace Database\Seeders;

use App\Models\TaxiRide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxiRideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaxiRide::factory()
            ->create();
    }
}
