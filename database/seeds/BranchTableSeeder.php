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
            'branch_name' => 'Kebon Jeruk',
            'branch_code' => 'BP'
        ]);

        App\Branch::create([
            'branch_name' => 'Gading Serpong',
            'branch_code' => 'GS'
        ]);
    }
}
