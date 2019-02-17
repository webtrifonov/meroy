<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(CurrenciesSeeder::class);
        $this->call(SlidersSeeder::class);
        $this->call(DeliveryPointsSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(CustomersSeeder::class);

        $this->call(ProductsSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CartsSeeder::class);
    }
}
