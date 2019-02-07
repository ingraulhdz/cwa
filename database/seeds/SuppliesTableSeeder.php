<?php

use Illuminate\Database\Seeder;

class SuppliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            	          DB::table('supplies')->insert([
            'name' => 'carpet soap',
            'description' => 'Soap for the carpet',
            'price' => 100,
            'measure' => 'Gallon'
               									]);

                                                  DB::table('supplies')->insert([
            'name' => 'Spray Bottles',
            'description' => 'Bottles to spray soap',
            'price' => 5,
            'measure' => 'Unit'
                                                ]);
    }
}
