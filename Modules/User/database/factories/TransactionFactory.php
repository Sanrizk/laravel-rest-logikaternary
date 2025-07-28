<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\User\Models\Transaction::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        // status 
        $status = ['paid', 'waiting', 'cancelled'];

        return [
            "user_id" => 1,
            "amount" => rand(200,2000),
            "status" => $status[rand(0,count($status)-1)],
            "description" => fake()->text
        ];
    }
}

