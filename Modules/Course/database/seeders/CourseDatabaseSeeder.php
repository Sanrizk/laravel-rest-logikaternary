<?php

namespace Modules\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Course\Models\Course;

class CourseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->count(10)->create();
        // $this->call([]);
    }
}
