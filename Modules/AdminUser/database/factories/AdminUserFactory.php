<?php

namespace Modules\AdminUser\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\AdminUser\Models\AdminUser::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $adminRole = ['menthor', 'admin', 'superadmin'];

        return [
            'username' => fake()->userName(),
            'admin_name' => fake()->name(),
            'password' => Hash::make('password'),
            'admin_role' => $adminRole[rand(0, count($adminRole)-1)],
        ];
    }
}

