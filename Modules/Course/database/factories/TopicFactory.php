<?php

namespace Modules\Course\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Course\Models\Topic::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "topic_name" => fake()->name(),
            "lesson_id" => 1
        ];
    }
}

