<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
        $name = $this->faker->name();
        return [
            //
            'name'=> $name,
            'price'=>200,
            'discount_price'=>rand(0,300),
            'reviews'=>rand(1,5),
            'sell'=>rand(1,30),
            'discription'=>$this->faker->randomHtml(2,3),
            'brand' => $name,
            'image' => 'https://picsum.photos/' . rand(1000,1500) . '/' . 800,
            'flavor_id'=>rand(1,5),
            'category_id'=>rand(1,5),
            'category_child_id'=>rand(1,5),
            'slug'=>Str::slug($name),
         ];
    }
}
