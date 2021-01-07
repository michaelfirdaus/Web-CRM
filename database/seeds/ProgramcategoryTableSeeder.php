<?php

use Illuminate\Database\Seeder;

class ProgramcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Programcategory::create([
            'name' => 'Advanced',
        ]);
    }
}
