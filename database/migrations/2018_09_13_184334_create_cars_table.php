<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('vin')->unique();
            $table->string('note')->nullable();
            $table->string('color')->nullable();
            $table->string('stock')->nullable();
            $table->double('price', 8, 2)->default(100);        
            $table->double('price_plus', 8, 2)->default(0);        
            $table->integer('level')->default(0);   
            // $table->boolean('is_done')->default(0);   
            // $table->boolean('is_invoice')->default(0);   
            // $table->boolean('is_paid')->default(0);   
            $table->boolean('status')->default(1);   
            $table->integer('dealer_id')->unsigned()->nullable();
            $table->integer('body_style_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('employee_id')->unsigned()->nullable();
            $table->integer('service_id')->unsigned()->nullable();
            $table->integer('payment_id')->unsigned()->nullable();         
            $table->integer('user_id')->unsigned()->nullable(); 
            $table->integer('invoice_id')->unsigned()->nullable(); 
            $table->foreign('dealer_id')->references('id')->on('dealers');    
            $table->foreign('invoice_id')->references('id')->on('invoices');    
            $table->foreign('customer_id')->references('id')->on('customers');    
            $table->foreign('employee_id')->references('id')->on('employees');    
            $table->foreign('service_id')->references('id')->on('services');    
            $table->foreign('payment_id')->references('id')->on('payments');    
            $table->foreign('user_id')->references('id')->on('users');    
            $table->foreign('body_style_id')->references('id')->on('body_style');    
            $table->timestamps();




        });

             DB::table('cars')->insert([
            'make' => 'Chevy',
            'model' => 'Silverado',
            'year' => '2015',
            'vin' => '854925',
            'stock' => '234d',
            'dealer_id' => 1

                                            ]);

                  DB::table('cars')->insert([
            'make' => 'Chevy',
            'model' => 'Silverado',
            'year' => '2016',
            'vin' => '854975',
            'stock' => '234',
            'dealer_id' => 2

                                            ]);


    DB::table('cars')->insert([
            'make' => 'Porsche',
            'model' => 'Carrera',
            'year' => '2015',
            'vin' => '562349',
            'stock' => '54er',
            'employee_id' => 1,
            'dealer_id' => 3

                                            ]);



        DB::table('cars')->insert([
            'make' => 'VW',
            'model' => 'Passat',
            'year' => '2015',
            'vin' => '562789',
            'stock' => '54er',
            'employee_id' => 2,
            'dealer_id' => 3

                                            ]);



    

        DB::table('cars')->insert([
            'make' => 'Chryser',
            'model' => '300c',
            'year' => '2015',
            'vin' => '562459',
            'stock' => '54er',
            'employee_id' => 3,
            'dealer_id' => 3

                                            ]);



    

        DB::table('cars')->insert([
            'make' => 'Acura',
            'model' => 'tsx',
            'year' => '2015',
            'vin' => '598349',
            'stock' => '54er',
            'employee_id' => 1,
            'dealer_id' => 3

                                            ]);



    

    DB::table('cars')->insert([
            'make' => 'Ford',
            'model' => 'Fusion',
            'year' => '2015',
            'vin' => '659856',
            'stock' => '5erd',
            'employee_id' => 1,
            'customer_id' => 1

                                            ]);











    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
