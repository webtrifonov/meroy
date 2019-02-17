<?php

use Illuminate\Database\Seeder;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('carts')->insert([
      	[
      		'customer_id' => 1,
      		'order_id' => 2,
          'address' => 'ул. Молодежная 24 кв.22',
          'delivery_price' => 500
      	],[
      		'customer_id' => 1,
      		'order_id' => 3,
          'address' => 'ул. Колокольная 50 кв.2',
          'delivery_price' => 0
      	]
      ]);
    }
}
