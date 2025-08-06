<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Post\Models\Post;
use Modules\Post\Models\Category;
use Modules\Post\Database\Seeders\CategoryDatabaseSeeder;

class PostDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory()->count(5)->create();
        $this->call([CategoryDatabaseSeeder::class]);
        Post::factory()->count(5)->create();
    }
}
