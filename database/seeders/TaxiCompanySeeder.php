<?php

namespace Database\Seeders;

use App\Models\TaxiCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxiCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaxiCompany::factory()->count(5)->create();
    }
}
