<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('orders')->insert([
      	[
      		'product_id' => 1,
      		'count' => 2
      	],[
      		'product_id' => 2,
      		'count' => 1
      	],[
      		'product_id' => 3,
      		'count' => 10
      	],[
      		'product_id' => 4,
      		'count' => 5
      	],

      ]);
    }
}
