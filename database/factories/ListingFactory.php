<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beds' => $this->faker->numberBetween(1, 7),
            'baths' => $this->faker->numberBetween(1, 7),
            'area' => $this->faker->numberBetween(500, 10000),
            'city' => $this->faker->city,
            'area_code' => $this->faker->postcode,
            'street' => $this->faker->streetName,
            'street_nr' => $this->faker->buildingNumber,
            'price' => $this->faker->numberBetween(100_000, 4_000_000),
        ];
    }
}
