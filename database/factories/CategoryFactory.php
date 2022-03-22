<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{   

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
       // dd(20);
        // $user = DB::table('users')
        //     ->inRandomOrder()
        //     ->limit(1)
        //     ->first(['id']);

        return [
            'name' => $this->faker->name(),
            'icon' => $this->faker->imageUrl,
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
