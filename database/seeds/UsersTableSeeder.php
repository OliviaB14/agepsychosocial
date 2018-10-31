<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Olivia",
            'last_name' => "Boumokonia",
            'email' => "olivia@creativebloom.fr",
            'password' => bcrypt('secret'),
        ]);
    }
}
