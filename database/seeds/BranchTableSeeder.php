<?php

use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Branch::create([
            'name' => 'Kebon Jeruk',
            'code' => 'BP'
        ]);

        App\Branch::create([
            'name' => 'Gading Serpong',
            'code' => 'GS'
        ]);
    }
}
