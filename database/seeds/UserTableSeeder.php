<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Admin CRM',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'admin' => 1,
            'photo' => 'user-picture.png'
        ]);

        $user1 = App\User::create([
            'name' => 'User CRM',
            'username' => 'user',
            'password' => bcrypt('password'),
            'admin' => 0,
            'photo' => 'user-picture.png'
        ]);
    }
}
