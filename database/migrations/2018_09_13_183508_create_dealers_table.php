<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');          
            $table->string('contact')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state')->default('IL');
            $table->string('country')->default('USA');
            $table->integer('zip_code');
            $table->boolean('status')->default(1);  
            $table->string('logo')->nullable();
            $table->string('manager')->nullable();
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
        Schema::dropIfExists('dealers');
    }
}
