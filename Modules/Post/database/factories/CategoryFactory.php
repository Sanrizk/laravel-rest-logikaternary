<?php

namespace Modules\Post\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Post\Models\Category::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $category = ['Technology', 'Programming', 'Electro', 'Software Engineering', 'Game'];

        return [
            'category' => $category[rand(0, count($category)-1)],
        ];
    }
}

