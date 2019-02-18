<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
                        $table->string('username')->nullable()->unique();
            $table->integer('employee_id')->unsigned()->nullable(); 
            $table->foreign('employee_id')->references('id')->on('employees');  
                        $table->boolean('status')->default(1);  

            //$table->integer('rol_id')->unsigned()->nullable(); 
           // $table->foreign('rol_id')->references('id')->on('roles');    
            $table->rememberToken();

                   //$table->string('name');
     
            $table->timestamps();
        });


        DB::table('users')->insert([
        'email' => 'raulhernandezing@gmail.com',
        'username' => 'ingraulhdz',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'employee_id' => 1, // secret
        //'remember_token' => str_random(10),
        //'name' => 'Raul Hernandez',


        ]);  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
