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
        Schema::create('rols', function (Blueprint $table) {
         $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->boolean('status')->default(1);     
             $table->timestamps();
        });

        DB::table('rols')->insert([
            'name' => 'Admin',
            'description' => 'Can access to whole application and services'                                                 ]);
DB::table('rols')->insert([
            'name' => 'Manager',
            'description' => 'Can  check and aproval cars'      
                                                        ]);
DB::table('rols')->insert([
            'name' => 'Detailer',
            'description' => 'Just to make details '      
                                                        ]);
DB::table('rols')->insert([
            'name' => 'Salaried',
            'description' => 'worker who is paid a fixed amount of money or compensation'      
                                                        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rols');
    }
}
