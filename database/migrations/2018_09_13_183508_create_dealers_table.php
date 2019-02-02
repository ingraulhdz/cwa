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

            DB::table('dealers')->insert([
            'name' => 'Advantage Chevy',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'contact' => 'Juan Perez',
            'contact_phone' => '456956598',
            'manager' => 'John smit',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'logo' => 'chevy',
                                            ]); 


               DB::table('dealers')->insert([
            'name' => 'Porsche of westmont ',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'contact' => 'Juan Perez',
            'contact_phone' => '456956598',
            'manager' => 'John smit',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'logo' => 'chevy',
                                            ]); 



                  DB::table('dealers')->insert([
            'name' => 'Ultima Motors',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'contact' => 'Juan Perez',
            'contact_phone' => '456956598',
            'manager' => 'John smit',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'logo' => 'chevy',
                                            ]); 
    DB::table('dealers')->insert([
            'name' => 'ford',
            'email' => 'raulhernandezing@gmail.com',
            'phone' => '46595659',
            'contact' => 'Juan Perez',
            'contact_phone' => '456956598',
            'manager' => 'John smit',
            'address' => '544 boughton rd',
            'city' => 'Bolngbrook',
            'zip_code' => 60440,
            'logo' => 'chevy',
                                            ]); 







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
