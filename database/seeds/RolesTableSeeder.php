<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // Dit is voor role_id 1, Oftwel User

        DB::table('roles')->insert([
            'role_name' => 'User',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        // Dit is voor role_id 2, Oftwel ADMIN

        DB::table('roles')->insert([
            'role_name' => 'Administrator',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);

        // Dit is voor role_id 3, Oftwel MODERATOR

        DB::table('roles')->insert([
           'role_name' => 'Moderator',
            'created_at' => $faker->dateTime,
            'updated_at' => $faker->dateTime,
        ]);
    }
}
