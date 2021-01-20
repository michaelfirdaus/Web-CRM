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
            'name' => 'Michael',
            'username' => 'michael',
            'password' => bcrypt('password'),
            'admin' => 1,
            'photo' => 'logo-cn.png'
        ]);

        $user1 = App\User::create([
            'name' => 'User',
            'username' => 'user',
            'password' => bcrypt('password'),
            'admin' => 0,
            'photo' => 'logo-cn.png'
        ]);
    }
}
