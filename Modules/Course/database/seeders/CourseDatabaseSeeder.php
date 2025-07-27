<?php

namespace Modules\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Course\Models\Course;
use Modules\Course\Database\Seeders\LessonDatabaseSeeder;
use Modules\Course\Database\Seeders\TopicDatabaseSeeder;
use Modules\Course\Database\Seeders\ContentDatabaseSeeder;

class CourseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->count(10)->create();
        
        $this->call([
            LessonDatabaseSeeder::class,
            TopicDatabaseSeeder::class,
            ContentDatabaseSeeder::class
        ]);
    }
}
