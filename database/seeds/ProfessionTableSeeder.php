<?php

use Illuminate\Database\Seeder;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Profession::create([
            'name' => 'Belum Bekerja'
        ]);

        App\Profession::create([
            'name' => 'CEO'
        ]);
    }
}
