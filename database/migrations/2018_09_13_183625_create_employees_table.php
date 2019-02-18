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
            'email' => 'angel@gmail.com',
            'phone' => '7221231235',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 3

                                            ]); 


                DB::table('employees')->insert([
            'name' => 'Alfredo ',
            'last_name' => 'Quintana',
            'email' => 'alfredo@gmail.com',
            'phone' => '6301234567',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 2

                                            ]); 

                       DB::table('employees')->insert([
            'name' => 'Sotero ',
            'last_name' => 'Cabrera',
            'email' => 'Sotero@gmail.com',
            'phone' => '6301236578',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 2

                                            ]); 

                                DB::table('employees')->insert([
            'name' => 'Cecilio ',
            'last_name' => 'Gonzales',
            'email' => 'cecilio@gmail.com',
            'phone' => '3312645123',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 4

                                            ]); 



                                DB::table('employees')->insert([
            'name' => 'odin ',
            'last_name' => 'Ruiz',
            'email' => 'odin@gmail.com',
            'phone' => '6302831156',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 4

                                            ]); 

                                                                DB::table('employees')->insert([
            'name' => 'Carlos ',
            'last_name' => 'Ruiz',
            'email' => 'carlos@gmail.com',
            'phone' => '6305821345',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 4

                                            ]); 

                                                                                                DB::table('employees')->insert([
            'name' => 'Lino ',
            'last_name' => 'Perez',
            'email' => 'lino@gmail.com',
            'phone' => '6302651245',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 5

                                            ]); 
                                                                                                DB::table('employees')->insert([
            'name' => 'Rick ',
            'last_name' => 'Carls',
            'email' => 'rick@gmail.com',
            'phone' => '6302513265',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 5

                                            ]); 

                                                                                                DB::table('employees')->insert([
            'name' => 'George  ',
            'last_name' => 'Smith',
            'email' => 'george@gmail.com',
            'phone' => '6302513265',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 6

                                            ]); 

                                                                                                DB::table('employees')->insert([
            'name' => 'Rogelio ',
            'last_name' => 'Perez',
            'email' => 'rogelio@gmail.com',
            'phone' => '6302512654',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'rol_id' => 6

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
