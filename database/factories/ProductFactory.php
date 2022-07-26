<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph,
            'image'=>'1659275645.png',
            'promo'=>0,
            'featured'=>0,
            'price'=>55,
            'category'=>'Pants',
            'for'=>'Men',
            'created_at'=>now()
        ];
    }
}
