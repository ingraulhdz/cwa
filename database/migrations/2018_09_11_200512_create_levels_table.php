<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

         DB::table('levels')->insert(['name' => 'Arrived', 'description' => 'Car just arrived' ]); 
         DB::table('levels')->insert(['name' => 'Ready', 'description' => 'When car is perfect done ready to deliver' ]); 
         DB::table('levels')->insert(['name' => 'Invoiced ', 'description' => 'When car is delivered, and paid is pending.' ]); 
         DB::table('levels')->insert(['name' => 'Paid', 'description' => 'Car is paid' ]); 


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
