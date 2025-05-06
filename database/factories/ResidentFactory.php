<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\CityArea;
use App\Models\Resident;
use App\Models\TaxiRide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    protected $model = Resident::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,

            'city' => City::factory(),
            'area' => CityArea::factory()
        ];
    }

    public function withTaxiRides(int $count = 3): static
    {
        return $this->has(TaxiRide::factory()->count($count));
    }
}
