<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BodyStyleTableSeeder::class);
         $this->call(ExtrasTableSeeder::class);
         $this->call(PaymentsTableSeeder::class);
         $this->call(RolsTableSeeder::class);
         $this->call(ServicesTableSeeder::class);
         $this->call(CarsTableSeeder::class);
         $this->call(ExpensesTableSeeder::class);
         $this->call(SuppliesTableSeeder::class);
    }
}
