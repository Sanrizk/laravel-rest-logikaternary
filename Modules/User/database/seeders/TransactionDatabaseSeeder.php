<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;

use Modules\User\Models\Transaction;

class TransactionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::factory()->count(5)->create();
        // $this->call([]);
    }
}
