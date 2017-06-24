<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        //Zeker weten dat de eerste user één admin is
        DB::table('users')->insert([
            'username' => 'Rainieren',
            'email' => 'rainier.laan@home.nl',
            'password' => bcrypt('US99#FA197y700'),
            'role_id' => 2,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        DB::table('users')->insert([
            'username' => 'johanstr',
            'email' => 'jj.strootman@alfa-college.nl',
            'password' => bcrypt('welkom'),
            'role_id' => 3,
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        // Onderste code maakt 8 random users aan met het wachtwoord 'Welkom'

        foreach(range(1,8) as $index) {
            DB::table('users')->insert([
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('welkom'),
                'role_id' => 1,
                'created_at' => $faker->dateTime,
                'updated_at' => $faker->dateTime,
            ]);
        }
    }
}
