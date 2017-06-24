<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,10) as $index) {
            DB::table('themes')->insert([
                'theme_title' => $faker->sentence(3) . ' - ' . $index,
                'theme_description' => $faker ->sentence(),
                'user_id' => 1,
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }
    }
}
