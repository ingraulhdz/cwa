<?php

use Illuminate\Database\Seeder;

class BodyStyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('body_style')->insert([
            'name' => 'Sedan',
            'description' => 'car with four doors'
        									]);       

         DB::table('body_style')->insert([
            'name' => 'SUV',
            'description' => 'Big car built on a body-on-frame chassis'
               									]);

          DB::table('body_style')->insert([
            'name' => 'Truck',
            'description' => 'large, heavy motor vehicle'
               									]);

          DB::table('body_style')->insert([
            'name' => 'VAN',
            'description' => 'Type of road vehicle used for transporting goods or people'
               									]);

          DB::table('body_style')->insert([
            'name' => 'Sport & Delux',
            'description' => 'Luxury Brands Cars'
               									]);




    }
}
