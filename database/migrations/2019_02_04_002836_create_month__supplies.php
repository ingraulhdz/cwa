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
       Schema::create('month_passive_supply', function (Blueprint $table) {
         $table->increments('id');
         
              $table->integer('supply_id')->unsigned()->nullable();
            $table->foreign('supply_id')->references('id')->on('supplies')->onDelete('cascade');    

                          $table->integer('month_passive_id')->unsigned()->nullable();
            $table->foreign('month_passive_id')->references('id')->on('month_passives')->onDelete('cascade');  
                        $table->double('total_price', 8, 2)->default(0);  
                        $table->double('amount', 8, 2)->default(0);  

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
        Schema::dropIfExists('month_passive_supply');
    }
}
