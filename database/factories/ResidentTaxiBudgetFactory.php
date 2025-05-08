<?php

namespace Database\Factories;

use App\Enums\ResidentBudgetStatus;
use App\Models\ResidentTaxiBudget;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResidentTaxiBudget>
 */
class ResidentTaxiBudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'current_amount' => $this->faker->numberBetween(0, ResidentTaxiBudget::MAX_BUDGET),
            'max_amount' => ResidentTaxiBudget::MAX_BUDGET,
            'status' => Arr::random(ResidentBudgetStatus::cases())->value,
            'valid_until' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
        ];
    }
}
