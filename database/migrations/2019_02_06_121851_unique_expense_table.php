<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UniqueExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
             Schema::create('unique_expenses', function (Blueprint $table) {
            $table->increments('id');
           $table->string('name');
           $table->string('description');
            $table->double('price', 8, 2)->default(0);  
                 $table->integer('month_passive_id')->unsigned()->nullable();
            $table->foreign('month_passive_id')->references('id')->on('month_passives')->onDelete('cascade');  
            //$table->boolean('status')->default(1);   
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
        //
                Schema::dropIfExists('unique_expenses');

    }
}
