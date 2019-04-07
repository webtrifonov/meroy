<?php

use Illuminate\Database\Seeder;
use App\Enums\OrderStatus;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Order::insert([
        	[
                'user_id' => 1,
                'status' => OrderStatus::getKey(1),
                'address' => 'ул. Садовая 55',
                'total_price' => 1500
            ],[
                'user_id' => 2,
                'status' => OrderStatus::getKey(2),
                'address' => 'ул. Дефолтная 1',
                'total_price' => 2000
            ],[
                'user_id' => 3,
                'status' => OrderStatus::getKey(0),
                'address' => null,
                'total_price' => 3000
            ],[
                'user_id' => 2,
                'status' => OrderStatus::getKey(4),
                'address' => null,
                'total_price' => 800
            ],

        ]);
    }
}
