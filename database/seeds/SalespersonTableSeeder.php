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
        App\SalesPerson::create([
            'name' => 'Hana Oktapiane'
        ]);

        App\SalesPerson::create([
            'name' => 'Dina Martina'
        ]);

        App\SalesPerson::create([
            'name' => 'Hanifah Kusdinar'
        ]);
    }
}
