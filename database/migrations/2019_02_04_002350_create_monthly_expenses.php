<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('month_passives', function (Blueprint $table) {
            $table->increments('id');
            $table->date('month');
           $table->string('month_name');
            $table->double('price', 8, 2)->default(0);  
            //$table->boolean('status')->default(1);   
            $table->timestamps();
        });
    }

      public function down()
    {
        Schema::dropIfExists('month_passives');
    }
}
