<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CarsTableSeeder extends Seeder
{
   
     public function run(Faker $faker)
    {

factory(App\Models\Car::class,3)->create();


/*        DB::table('cars')->insert([

              'make' => $faker->name('male'|'female'),
            'model' => 'Silverado',
            'year' => '2015',
            'vin' => '123496',
            'stock' => '234d',
            'employee_id' => 1,
            'dealer_id' => 1,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-15 01:01:13'
        ]);
*/
    
    }






}

