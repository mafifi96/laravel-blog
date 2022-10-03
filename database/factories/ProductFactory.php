<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->title(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->boolean(),
            'stock' => rand(0,6),
            'price' => rand(10,3000),
            'category_id' => Category::factory()

        ];
    }
}
