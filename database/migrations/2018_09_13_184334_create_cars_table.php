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
            //$table->integer('level')->default(0);   
            $table->boolean('status')->default(1);   
            $table->integer('level_id')->unsigned()->default(1);
            $table->integer('dealer_id')->unsigned()->nullable();
            $table->integer('body_style_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('employee_id')->unsigned()->nullable();
            $table->integer('service_id')->unsigned()->nullable();
            $table->integer('payment_id')->unsigned()->nullable();         
            $table->integer('user_id')->unsigned()->nullable(); 
            $table->integer('invoice_id')->unsigned()->nullable(); 
            $table->foreign('level_id')->references('id')->on('levels');    
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
