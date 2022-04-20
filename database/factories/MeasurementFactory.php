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
        $blood1 = $this->faker->numberBetween(16, 40) * 5;
        $blood2 = 201;
        while ($blood2 > $blood1) {
            $blood2 = $this->faker->numberBetween(8, 30) * 5;
        }
        return [
            'weight_kg' => $this->faker->randomFloat(2, 50, 200),
            'fat_percentage' => $this->faker->randomFloat(2, 0, 100),
            'blood_pressure' => $blood1 . ' / ' . $blood2,
            'client_id' => Client::all()->random()->id,
        ];
    }
}
