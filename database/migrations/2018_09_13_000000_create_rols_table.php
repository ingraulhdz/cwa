<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
         $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->boolean('status')->default(1);     
             $table->timestamps();
        });
  
           DB::table('roles')->insert([
            'name' => 'Developer',
            'description' => 'Can access to whole application, services create and delete data'
        ]);    
        

               DB::table('roles')->insert([
            'name' => 'Admin',
            'description' => 'Can access to whole application and services'
        ]);

DB::table('roles')->insert([
            'name' => 'Manager',
            'description' => 'Can  check and aproval cars'      
        ]);

DB::table('roles')->insert([
            'name' => 'Detailer',
            'description' => 'Just to make details '      
        ]);

DB::table('roles')->insert([
            'name' => 'Salaried',
            'description' => 'worker who is paid a fixed amount of money or compensation'      
            ]);

DB::table('roles')->insert([
            'name' => 'External',
            'description' => 'worker who is working in the customer location'      
            ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
