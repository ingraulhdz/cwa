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
     Schema::create('monthly_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('month');
           $table->string('month_name');
            $table->double('cost', 8, 2)->default(0);  
            //$table->boolean('status')->default(1);   
            $table->timestamps();
        });
    }

      public function down()
    {
        Schema::dropIfExists('monthly_expenses');
    }
}
