<?php

use Illuminate\Database\Seeder;

class CoachTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Coach::create([
            'name' => 'Coach',
            'email' => 'coach@coach.com',
            'phonenumber'   => '628561111111',
            'dob'   => '1970-01-01',
            'address'   => 'An Address',
        ]);
    }
}
