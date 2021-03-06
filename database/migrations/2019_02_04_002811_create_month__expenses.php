<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('month_passive_expense', function (Blueprint $table) {
         $table->increments('id');
         
            $table->integer('expense_id')->unsigned()->nullable();
            $table->foreign('expense_id')->references('id')->on('expenses')->onDelete('cascade');  
                                $table->integer('month_passive_id')->unsigned()->nullable();
            $table->foreign('month_passive_id')->references('id')->on('month_passives')->onDelete('cascade');  
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
        Schema::dropIfExists('month_passive_expense');
    }
}

