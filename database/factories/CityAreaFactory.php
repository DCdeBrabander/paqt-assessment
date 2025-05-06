<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\CityArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CityArea>
 */
class CityAreaFactory extends Factory
{
    protected $model = CityArea::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'city_id' => City::factory(),
        ];
    }
}
