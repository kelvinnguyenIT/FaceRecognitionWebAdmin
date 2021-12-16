<?php

namespace Database\Factories;

use App\Models\InfoAccount;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class InfoAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InfoAccount::class;

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
            'avatar'=>$this->faker->image(),
            'phone_number'=>$this->faker->phoneNumber,
            'address'=>$this->faker->address,
            'user_id'=>rand(1,3),
        ];
    }
}
