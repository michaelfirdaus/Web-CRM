<?php

use Illuminate\Database\Seeder;

class ProgramNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Programname::create([
            'name' => 'CCNA',
            'program_price' => '5000000'
        ]);
    }
}
