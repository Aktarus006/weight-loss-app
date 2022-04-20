<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'birthday' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'length_cm' => $this->faker->randomFloat(2, 120, 220),
            'email' => $this->faker->unique()->safeEmail,
            'profile_photo' => 'image/' . $this->faker->image('storage/app/public/image', 200, 200, null, false),
        ];
    }
}
