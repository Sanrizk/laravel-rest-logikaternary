<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;

use Modules\User\Database\Seeders\ProgressDatabaseSeeder;
use Modules\User\Database\Seeders\TransactionDatabaseSeeder;

use Modules\User\Models\User;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->create();

        $this->call([
            TransactionDatabaseSeeder::class,
            ProgressDatabaseSeeder::class,
        ]);
    }
}
