<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'destination' => fake()->randomElement(['Coruscant', 'Bespin', 'Naboo', 'Alderaan', 'Dagobah', 'Hoth', 'Kashyyyk', 'Tatooine', 'Geonosis', 'Kamino']),
            'price' => fake()->numberBetween(2000, 10000),
            'departure' => fake()->dateTimeBetween('now', '+1 year')
        ];
    }
}
