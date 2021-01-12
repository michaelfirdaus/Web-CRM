<?php

use Illuminate\Database\Seeder;

class ProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Program::create([
            'branch_id' => '1',
            'programcategory_id' => '1',
            'programname_id' => '1',
            'date'   => '2021-01-20',
        ]);
    }
}
