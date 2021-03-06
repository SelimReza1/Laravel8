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
        // \App\Models\User::factory(10)->create();
        $this->call([
           PostTableSeeder::class,
           UserTableSeeder::class,
            StudentTableSeeder::class,
            PostscrollTableSeeder::class,
        ]);
        \App\Models\Postapi::factory(20)->create();
    }
}
