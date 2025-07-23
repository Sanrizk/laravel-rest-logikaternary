<?php

namespace Modules\Course\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Course\Models\Course::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $titles = [
            "Fullstack Web Dev",
            "Backend Dev",
            "Frontend Web Dev",
            "Mobile Dev",
            "DevOps Engineer",
            "MLOps Engingeer",
            "Data Science",
            "Data Analyst"
        ];

        return [
            'title' => $titles[rand(0,count($titles)-1)],
            'description' => fake()->text(),
            'price' => rand(0, 100)
        ];
    }
}

