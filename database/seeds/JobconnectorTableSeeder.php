<?php

use Illuminate\Database\Seeder;

class JobconnectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Jobconnector::create([
            'name' => 'BCA',
            'location' => 'Jakarta'
        ]);
    }
}
