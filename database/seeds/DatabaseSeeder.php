<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(RepliesTableSeeder::class);
    }
}
