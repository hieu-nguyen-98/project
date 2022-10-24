<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'name'=>$this->faker->word,

            'image'=>$this->faker->imageUrl(100, 100),
            'parent_id'=>$this->faker->randomElement(Category::pluck('id')->toArray()),
        ];
    }
}
