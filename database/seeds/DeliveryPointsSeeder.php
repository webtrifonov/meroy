<?php

use Illuminate\Database\Seeder;

class DeliveryPointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	DB::table('delivery_points')->insert([
      	[
      		'title' => 'Пункт выдачи 1',
      		'city' => 'Ростов-на-Дону',
      		'address' => 'ул. Серафимовича 17',
      		'image' => 'delivery_pic1.jpg'
      	],[
      		'title' => 'Пункт выдачи 2',
      		'city' => 'Москва',
      		'address' => 'ул. Кутузова 224',
      		'image' => 'delivery_pic2.jpg'
      	],[
      		'title' => 'Пункт выдачи 3',
      		'city' => 'Ростов-на-Дону',
      		'address' => 'ул. Садовая 9',
      		'image' => 'delivery_pic3.jpg'
      	]
      ]);
    }
}
