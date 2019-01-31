<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();          
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->default('IL');
            $table->string('country')->default('USA');
            $table->integer('zip_code')->nullable();
            $table->boolean('status')->default(1);   
            $table->timestamps();
        });


           DB::table('customers')->insert([
            'name' => 'Raul Hernandez',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
                                            ]); 


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
