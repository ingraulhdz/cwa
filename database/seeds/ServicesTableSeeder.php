<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

                          DB::table('services')->insert([
            'name' => 'Full Detail',
            'description' => 'An auto detail typically includes washing, waxing and detailing the exterior, and vacuuming, deep cleaning and detailing the interior. ',
            'price' => 100.00

               									]);

                          
                          DB::table('services')->insert([
            'name' => 'Hand Car Wash',
            'description' => 'clean the exterior and express vacum.',
            'price' => 40.00

               									]);


    }
}
