<?php

namespace Modules\AdminUser\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AdminUser\Models\AdminUser;

class AdminUserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::factory()->count(3)->create();
        // $this->call([]);
    }
}
