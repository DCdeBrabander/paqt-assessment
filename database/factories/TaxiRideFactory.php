<?php

namespace Database\Factories;

use App\Models\Resident;
use App\Models\TaxiCompany;
use App\Models\TaxiRide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaxiRide>
 */
class TaxiRideFactory extends Factory
{
    protected $model = TaxiRide::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $resident = Resident::inRandomOrder()->first();
        $company = $resident->cityArea->taxiCompany->first();
        return [
            'resident_id' => $resident->id,
            'taxi_company_id' => $company->id,
            'from_address' => $this->faker->address,
            'to_address' => $this->faker->address,
        ];
    }
}
