<?php

use Illuminate\Database\Seeder;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

                  DB::table('expenses')->insert([
            'name' => 'Rent',
            'description' => 'payment for the building rent',
            'price' => 2000            
                                                ]);


                  DB::table('expenses')->insert([
            'name' => 'Insurance',
            'description' => 'Insurance payment',
            'price' => 500
            
                                                ]);



                  DB::table('expenses')->insert([
            'name' => 'Water bill',
            'description' => 'Montly paymen for Water',
            'price' => 200
            
                                                ]);



                  DB::table('expenses')->insert([
            'name' => 'Paint',
            'description' => 'We paint tha main entrance',
            'price' => 200
            
                                                ]);




        
    }
}
