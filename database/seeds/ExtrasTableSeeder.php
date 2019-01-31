<?php

use Illuminate\Database\Seeder;

class ExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	          DB::table('extras')->insert([
            'name' => 'Gas 5 Dlls',
            'description' => 'Select if you put 5 Dollars Gas',
            'price' => 5.00
               									]);
                  DB::table('extras')->insert([
            'name' => 'Gas 10 Dlls',
            'description' => 'Select if you pay 10 Dollars Gas',
            'price' => 10.00
               									]);
        //


    }
}
