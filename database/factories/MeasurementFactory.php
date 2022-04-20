<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Measurement>
 */
class MeasurementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'weight_kg' => $this->faker->randomFloat(2, 50, 200),
            'fat_percentage' => $this->faker->randomFloat(2, 0, 100),
            'blood_pressure' => $this->faker->numberBetween(5, 25) * 10 . ' / ' . $this->faker->numberBetween(5, 25) * 10,
            'client_id' => Client::all()->random()->id,
        ];
    }
}
