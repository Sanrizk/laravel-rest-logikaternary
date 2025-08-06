<?php

namespace Modules\Course\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Course\Models\Content::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'topic_id' => 2,
            'title' => fake()->name(),
            'content' => fake()->text()
        ];
    }
}

