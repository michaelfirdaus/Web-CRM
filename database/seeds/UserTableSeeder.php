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
            'username' => 'michael@admin.com',
            'password' => bcrypt('password'),
            'admin' => 1,
        ]);

        $user1 = App\User::create([
            'name' => 'Michael',
            'username' => 'michael',
            'password' => bcrypt('password'),
            'admin' => 0,
        ]);
    }
}
