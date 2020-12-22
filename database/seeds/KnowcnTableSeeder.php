<?php

use Illuminate\Database\Seeder;

class KnowcnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\KnowCN::create([
            'name' => 'Google'
        ]);

        App\KnowCN::create([
            'name' => 'Instagram'
        ]);
    }
}
