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
            'price' => 100
               									]);
    }
}
