<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

                  DB::table('payments')->insert([
            'name' => 'Cash',
            'description' => 'Money in hand'
               									]);
        

                  DB::table('payments')->insert([
            'name' => 'Credit or debit Card',
            'description' => 'Slide Card with terminal'
               									]);
        

                  DB::table('payments')->insert([
            'name' => 'Transfer',
            'description' => 'Money is sent from one bank account to another'
               									]);
        
    }
}
