<?php

use Illuminate\Database\Seeder;

class CartProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\CartProduct::insert([
            [
                'user_id' => 1,
                'order_id' => 1,
                'product_id' => 5,
                'amount' => 2
            ],[
                'user_id' => 2,
                'order_id' => null,
                'product_id' => 2,
                'amount' => 1
            ],[
                'user_id' => 3,
                'order_id' => 2,
                'product_id' => 3,
                'amount' => 1
            ],[
                'user_id' => 3,
                'order_id' => 2,
                'product_id' => 4,
                'amount' => 1
            ],[
                'user_id' => 2,
                'order_id' => null,
                'product_id' => 4,
                'amount' => 5
            ],

        ]);
    }
}
