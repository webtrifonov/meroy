<?php

use Illuminate\Database\Seeder;

class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sliders')->insert([
      	[
      		'title' => 'Распродажа',
      		'path' => '/',
      		'image' => 'https://via.placeholder.com/800x501'
      	],[
          'title' => 'SALE',
          'path' => '/',
          'image' => 'https://via.placeholder.com/800x502'
      	],
        [
          'title' => 'Скидка 15% на ВСЕ смеси',
          'path' => '/',
          'image' => 'https://via.placeholder.com/800x503'
        ]
      ]);
    }
}
