<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\User\Models\Reply::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'content_reply' => fake()->text(),
            'forum_id' => 3,
            'user_reply_id' => (rand(0,1) == 0) ? null : 1,
            'admin_reply_id' => (rand(0,1) == 0) ? null : 1
        ];
    }
}

