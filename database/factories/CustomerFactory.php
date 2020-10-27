<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'balance' => $this->faker->numberBetween(0, 2000) / 100,
            'birthday' => $this->faker->dateTimeThisCentury,
        ];
    }
}
