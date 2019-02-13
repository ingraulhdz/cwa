<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();          
            $table->string('photo')->nullable();          
            $table->string('address');
            $table->string('city');
            $table->string('state')->default('IL');
            $table->string('country')->default('USA');
            $table->integer('zip_code');
            $table->boolean('status')->default(1);   
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles'); 
           // $table->integer('user_id')->unsigned()->nullable();
           // $table->foreign('user_id')->references('id')->on('users');    
            $table->timestamps();

        });

           DB::table('employees')->insert([
            'name' => 'Raul ',
            'last_name' => 'Hernandez',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '4422263267',
            'address' => '217 bunkerhill  ',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 1

                                            ]); 


                DB::table('employees')->insert([
            'name' => 'Angel',
            'last_name' => 'Rodriguez',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 


                DB::table('employees')->insert([
            'name' => 'Alfredo ',
            'last_name' => 'Quintana',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 

                                DB::table('employees')->insert([
            'name' => 'Cecilio ',
            'last_name' => 'Gonzales',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 



                                DB::table('employees')->insert([
            'name' => 'odin ',
            'last_name' => 'Ruiz',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 

                                                                DB::table('employees')->insert([
            'name' => 'Carlos ',
            'last_name' => 'Ruiz',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 

                                                                                                DB::table('employees')->insert([
            'name' => 'Lino ',
            'last_name' => 'Perez',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 
                                                                                                DB::table('employees')->insert([
            'name' => 'Rick ',
            'last_name' => 'Carls',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 

                                                                                                DB::table('employees')->insert([
            'name' => 'George  ',
            'last_name' => 'Smith',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 

                                                                                                DB::table('employees')->insert([
            'name' => 'Rogelio ',
            'last_name' => 'Perez',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
