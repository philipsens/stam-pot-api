<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Income;
use Illuminate\Database\Eloquent\Factories\Factory;

class IncomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Income::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'customer_id' => Customer::all()->random(),
            'date' => $this->faker->dateTimeThisMonth,
            'amount' => $this->faker->numberBetween(500, 4000) / 100
        ];
    }
}
