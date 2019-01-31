<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	        DB::table('cars')->insert([
            'make' => 'Chevy',
            'model' => 'Silverado',
            'year' => '2015',
            'vin' => '123456',
            'stock' => '234d',
            'employee_id' => 1,
            'dealer_id' => 1,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-15 01:01:13'
                                            ]);


  DB::table('cars')->insert([
            'make' => 'Chevy',
            'model' => 'hhr',
            'year' => '2015',
            'vin' => '123256',
            'stock' => '234d',
            'employee_id' => 1,
            'dealer_id' => 2,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-15 02:01:13'
                                            ]);

  DB::table('cars')->insert([
            'make' => 'Chevy',
            'model' => 'Silverado',
            'year' => '2015',
            'vin' => '123462',
            'employee_id' => 2,
            'stock' => '234d',
            'dealer_id' => 2,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-16 03:01:13'
                                            ]);




  DB::table('cars')->insert([
            'make' => 'Chevy',
            'model' => 'Silverado',
            'year' => '2015',
            'vin' => '123486',
                        'employee_id' => 3,
            'stock' => '234d',
            'dealer_id' => 1,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-16 05:01:13'
                                            ]);




  DB::table('cars')->insert([
            'make' => 'Chevy',
            'model' => 'Silverado',
                        'employee_id' => 3,
            'year' => '2015',
            'vin' => '123451',
            'stock' => '234d',
            'dealer_id' => 1,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-17 04:01:13'
                                            ]);




  DB::table('cars')->insert([
            'make' => 'Chevy',
            'model' => 'Silverado',
            'year' => '2015',
            'vin' => '133456',
            'stock' => '234d',
                        'employee_id' => 4,
            'dealer_id' => 5,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-17 06:01:13'
                                            ]);




  DB::table('cars')->insert([
            'make' => 'Porshce',
            'model' => 'Caiman',
            'year' => '2015',
            'vin' => '112238',
                        'employee_id' => 5,
            'stock' => '234d',
            'dealer_id' => 4,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-17 07:01:13'
                                            ]);



  DB::table('cars')->insert([
            'make' => 'Porshce',
            'model' => 'Caiman',
            'year' => '2015',
            'vin' => '112237',
            'stock' => '234d',
            'dealer_id' => 4,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-17 08:01:13',    
                                'employee_id' => 1
                                            ]);


  DB::table('cars')->insert([
            'make' => 'Porshce',
            'model' => 'Caiman',
            'year' => '2015',
            'vin' => '112236',
            'stock' => '234d',
            'dealer_id' => 5,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-18 09:01:13',    
                                'employee_id' => 2
                                            ]);


  DB::table('cars')->insert([
            'make' => 'Porshce',
            'model' => 'spider',
            'year' => '2015',
            'vin' => '112235',
            'stock' => '234d',
            'dealer_id' => 2,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-18 10:01:13',    
                                'employee_id' => 2
                                            ]);


  DB::table('cars')->insert([
            'make' => 'Porshce',
            'model' => 'carrera',
            'year' => '2015',
            'vin' => '112234',
            'stock' => '234d',
            'dealer_id' => 1,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-18 11:01:13',    
                                'employee_id' => 3
                                            ]);


DB::table('cars')->insert([
            'make' => 'ferrari',
            'model' => 'f430',
            'year' => '2015',
            'vin' => '223340',
            'stock' => '234d',
            'dealer_id' => 2,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-18 04:02:13',    
                                'employee_id' => 4
                                            ]);


DB::table('cars')->insert([
            'make' => 'ferrari',
            'model' => 'f430',
            'year' => '2015',
            'vin' => '223341',
            'stock' => '234d',
            'dealer_id' => 5,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-18 04:03:13',    
                                'employee_id' => 1
                                            ]);


DB::table('cars')->insert([
            'make' => 'ferrari',
            'model' => 'f430',
            'year' => '2015',
            'vin' => '223342',
            'stock' => '234d',
            'dealer_id' => 1,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-18 04:04:13',    
                                'employee_id' => 5
                                            ]);


DB::table('cars')->insert([
            'make' => 'ferrari',
            'model' => 'f430',
            'year' => '2015',
            'vin' => '223345',
            'stock' => '234d',
            'dealer_id' => 5,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-19 04:05:13',    
                                'employee_id' => 4
                                            ]);


DB::table('cars')->insert([
            'make' => 'ferrari',
            'model' => 'f430',
            'year' => '2015',
            'vin' => '223346',
            'stock' => '234d',
            'dealer_id' => 4,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-20 04:06:13',    
                                'employee_id' => 3
                                            ]);


DB::table('cars')->insert([
            'make' => 'ferrari',
            'model' => 'f430',
            'year' => '2015',
            'vin' => '223348',
            'stock' => '234d',
            'dealer_id' => 3,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-21 04:07:13',    
                                'employee_id' => 1
                                            ]);


DB::table('cars')->insert([
            'make' => 'ferrari',
            'model' => 'f430',
            'year' => '2015',
            'vin' => '223349',
            'stock' => '234d',
            'dealer_id' => 3,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-21 04:08:13',    
                                'employee_id' => 2
                                            ]);





DB::table('cars')->insert([
            'make' => 'ferrari',
            'model' => 'f430',
            'year' => '2015',
            'vin' => '223344',
            'stock' => '234d',
            'dealer_id' => 2,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-21 04:09:13',    
                                'employee_id' => 3
                                            ]);


DB::table('cars')->insert([
            'make' => 'ford',
            'model' => 'fusion',
            'year' => '2015',
            'vin' => '514230',
            'stock' => '234d',
            'dealer_id' => 2,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-21 04:11:13',    
                                'employee_id' => 4
                                            ]);

DB::table('cars')->insert([
            'make' => 'ford',
            'model' => 'focus',
            'year' => '2015',
            'vin' => '514231',
            'stock' => '234d',
            'dealer_id' => 2,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-22 04:12:13',    
                                'employee_id' => 3
                                            ]);


DB::table('cars')->insert([
            'make' => 'ford',
            'model' => 'fusion',
            'year' => '2015',
            'vin' => '514232',
            'stock' => '234d',
            'dealer_id' => 3,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-22 04:51:13',    
                                'employee_id' => 2
                                            ]);



DB::table('cars')->insert([
            'make' => 'ford',
            'model' => 'f250',
            'year' => '2015',
            'vin' => '514233',
            'stock' => '234d',
            'dealer_id' => 4,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-23 04:18:13',    
                                'employee_id' => 1
                                            ]);


DB::table('cars')->insert([
            'make' => 'ford',
            'model' => 'escape',
            'year' => '2015',
            'vin' => '514235',
            'stock' => '234d',
            'dealer_id' => 4,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-24 04:25:13',    
                                'employee_id' => 1
                                            ]);




DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'charger',
            'year' => '2015',
            'vin' => '514251',
            'stock' => '234d',
            'dealer_id' => 1,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-24 04:30:13',    
                                'employee_id' => 4
                                            ]);

DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'hhr',
            'year' => '2015',
            'vin' => '514252',
            'stock' => '234d',
            'dealer_id' => 4,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-25 04:43:13',    
                                'employee_id' => 2
                                            ]);

DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'radius',
            'year' => '2015',
            'vin' => '514254',
            'stock' => '234d',
            'dealer_id' => 1,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-25 08:33:13',    
                                'employee_id' => 5
                                            ]);

DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'charger',
            'year' => '2015',
            'vin' => '514257',
            'stock' => '234d',
            'dealer_id' => 1,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-25 08:54:13',    
                                'employee_id' => 5
                                            ]);

DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'charger',
            'year' => '2015',
            'vin' => '514259',
            'stock' => '234d',
            'dealer_id' => 2,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-27 07:45:13',    
                                'employee_id' => 5
                                            ]);

DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'ram',
            'year' => '2015',
            'vin' => '514258',
            'stock' => '234d',
            'dealer_id' => 2,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-28 09:43:13',    
                                'employee_id' => 3
                                            ]);
        //


DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'ram',
            'year' => '2015',
            'vin' => '555359',
            'stock' => '234d',
            'dealer_id' => 4,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-28 09:49:13',    
                                'employee_id' => 2
                                            ]);
        //


DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'ram',
            'year' => '2015',
            'vin' => '334567',
            'stock' => '234d',
            'dealer_id' => 4,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-29 09:43:13',    
                                'employee_id' => 3
                                            ]);
        //


DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'ram',
            'year' => '2015',
            'vin' => '666345',
            'stock' => '234d',
            'dealer_id' => 5,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-29 08:33:13',    
                                'employee_id' => 2
                                            ]);
        //


DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'ram',
            'year' => '2015',
            'vin' => '653455',
            'stock' => '234d',
            'dealer_id' => 5,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-30 07:43:13',    
                                'employee_id' => 1
                                            ]);
        //

                                           

DB::table('cars')->insert([
            'make' => 'dodge',
            'model' => 'ram',
            'year' => '2015',
            'vin' => '342351',
            'stock' => '234d',
            'dealer_id' => 4,
            'body_style_id' => 1,
            'service_id' => 1,
            'color' => 'red',
            'created_at' => '2019-01-30 05:43:13'
                                            ]);


        //


    }
}
