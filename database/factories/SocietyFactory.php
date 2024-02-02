<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Society>
 */
class SocietyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'regional_id' => $this->faker->randomDigitNotNull(),
            'id_card_number' => $this->faker->randomNumber(8, true),
            'password' => 'password',
            'name' => $this->faker->name(),
            'born_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male','female']),
            'address' => $this->faker->address(),
        ];
    }
}
