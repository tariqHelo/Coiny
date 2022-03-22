<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class GeneralIncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         $category = DB::table('categories')
            ->inRandomOrder()
            ->limit(1)
            ->first(['id']);

        $user = DB::table('users')
        ->inRandomOrder()
        ->limit(1)
        ->first(['id']);

        $type = ['expenses' , 'revenues'];

        return [
            'category_id' => $category,
            'icon' => $this->faker->imageUrl,
            'amount' => $this->faker->numberBetween(0, 100),
            'note' => $this->faker->text(),
            'type' => $this->faker->randomElement($type),
            'user_id' => $user, 
        ];
    }
}
