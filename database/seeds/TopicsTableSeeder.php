<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,20) as $index) {
            DB::table('topics')->insert([
                'topic_title' => $faker->sentence(3) . ' - ' . $index,
                'topic_text' => $faker ->paragraph,
                'theme_id' => rand(1, 10),
                'user_id' => rand(1, 10),
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }
    }
}
