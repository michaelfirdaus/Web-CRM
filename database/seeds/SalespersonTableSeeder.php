<?php

use Illuminate\Database\Seeder;

class SalespersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Salesperson::create([
            'name' => 'Hana Oktapiane'
        ]);

        App\Salesperson::create([
            'name' => 'Dina Martina'
        ]);

        App\Salesperson::create([
            'name' => 'Hanifah Kusdinar'
        ]);
    }
}
