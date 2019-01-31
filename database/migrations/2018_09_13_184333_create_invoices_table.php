<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
           $table->increments('id');      
           $table->integer('dealer_id')->unsigned()->nullable();
           $table->integer('payment_id')->unsigned()->nullable();
           $table->integer('customer_id')->unsigned()->nullable();
           $table->double('due', 8, 2);        
           $table->date('due_by')->nullable(); 
           $table->integer('send_times')->nullable();     
           $table->boolean('is_paid')->default(0);   
           $table->foreign('payment_id')->references('id')->on('payments');    
           $table->foreign('dealer_id')->references('id')->on('dealers');    
           $table->foreign('customer_id')->references('id')->on('customers');    
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
        Schema::dropIfExists('invoices');
    }
}
