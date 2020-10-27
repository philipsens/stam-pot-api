<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::all()->random();
        return [
            'id' => $this->faker->uuid,
            'product_id' => $product,
            'customer_id' => Customer::all()->random(),
            'date' => $this->faker->dateTimeThisMonth,
            'amount' => $product->price
        ];
    }
}
