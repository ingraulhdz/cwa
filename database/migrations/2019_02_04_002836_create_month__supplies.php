<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthSupplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('month_supplies', function (Blueprint $table) {
         $table->increments('id');
         
              $table->integer('supply_id')->unsigned()->nullable();
            $table->foreign('supply_id')->references('id')->on('supplies')->onDelete('cascade');    

                          $table->integer('month_id')->unsigned()->nullable();
            $table->foreign('month_id')->references('id')->on('monthly_expenses')->onDelete('cascade');  
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
        Schema::dropIfExists('month_supplies');
    }
}
