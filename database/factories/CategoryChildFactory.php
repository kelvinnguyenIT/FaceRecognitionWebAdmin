<?php

namespace Database\Factories;

use App\Models\CategoryChild;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CategoryChildFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryChild::class;

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
            'slug'=>Str::slug($name),
            'category_id'=>rand(1,5),
        ];
    }
}
