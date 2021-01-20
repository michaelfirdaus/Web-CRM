<?php

use Illuminate\Database\Seeder;

class CoachProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\CoachProgram::create([
            'coach_id' => '1',
            'program_id' => '1',
        ]);
    }
}
