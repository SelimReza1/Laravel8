<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostscrollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,100) as $index){
            DB::table('postscrolls')->insert([
                'title' => $faker->sentence(5),
                'body' => $faker->paragraph(5)
            ]);
        }
    }
}
