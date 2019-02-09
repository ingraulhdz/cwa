<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class DealersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Models\Dealer::class,10)->create();

        //
    }
}
