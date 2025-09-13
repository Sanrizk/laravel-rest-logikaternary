<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\AdminUser\Database\Seeders\AdminUserDatabaseSeeder;
use Modules\Course\Database\Seeders\CourseDatabaseSeeder;
use Modules\Post\Database\Seeders\PostDatabaseSeeder;
use Modules\User\Database\Seeders\UserDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            AdminUserDatabaseSeeder::class,
            CourseDatabaseSeeder::class,
            UserDatabaseSeeder::class,
            PostDatabaseSeeder::class,
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
