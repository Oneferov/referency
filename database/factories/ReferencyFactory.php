<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ReferencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->colorName(),
            'sort' => rand(1, 1000)
        ];
    }
}
