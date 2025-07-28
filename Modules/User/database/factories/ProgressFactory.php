<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProgressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\User\Models\Progress::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "user_id" => 1,
            "content_id" => 1,
            "lesson_id" => 1,
            "completion_status" => rand(10,100),
            "progress_timestamp" => rand(1, 10000),
        ];
    }
}

