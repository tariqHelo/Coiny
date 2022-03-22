<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssetsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
       // dd(20);
        return [
            'name' => $this->faker->name(),
            'icon' => $this->faker->imageUrl,
            'useful_life' => $this->faker->numberBetween(5, 15),
            'depreciation' => $this->faker->numberBetween(1, 8),
            'value' => $this->faker->randomFloat(4, 0, 10000),
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
