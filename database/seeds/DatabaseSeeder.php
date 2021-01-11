<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(ProgramTableSeeder::class);
        $this->call(ProgramcategoryTableSeeder::class);
        $this->call(JobconnectorTableSeeder::class);
        $this->call(KnowcnTableSeeder::class);
        $this->call(ProfessionTableSeeder::class);
        $this->call(SalespersonTableSeeder::class);
        $this->call(CoachTableSeeder::class);
        $this->call(CoachProgramTableSeeder::class);
    }
}
