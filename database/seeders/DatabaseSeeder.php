<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if ( \App\Models\User::count() == 0)
             \App\Models\User::factory(10)->create();

         \App\Models\Ticket::factory(1)->create();
    }
}
