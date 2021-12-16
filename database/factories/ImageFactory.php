<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

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
            'src'=>'https://picsum.photos/' . rand(1000,1500) . '/' . 800,
            'slug'=>Str::slug($name),
            'product_id'=>rand(1,50),
        ];
    }
}
