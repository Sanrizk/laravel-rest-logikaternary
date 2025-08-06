<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ForumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\User\Models\Forum::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'content' => fake()->text(),
            'user_forum_id' => (rand(0,1) == 0) ? null : 1,
            'admin_forum_id' => (rand(0,1) == 0) ? null : 1
        ];
    }
}

