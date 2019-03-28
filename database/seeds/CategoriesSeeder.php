<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
      	[
      		'title' => 'Строительные смеси',
          'alias' => 'smesi'
      	],[
      		'title' => 'Сайдинг',
          'alias' => 'saiding'
      	],[
      		'title' => 'Краски',
          'alias' => 'kraski'
      	],[
      		'title' => 'Кровельные материалы',
          'alias' => 'krovelnye_materiali'
      	],[
      		'title' => 'Плитка',
          'alias' => 'plitka'
      	],[
      		'title' => 'Напольные покрытия',
          'alias' => 'napolnye_pokrytiya'
      	],[
          'title' => 'Бетонные изделия',
          'alias' => 'betonnie_izdeliya'
        ],[
          'title' => 'Утеплители',
          'alias' => 'yteplitely'
        ],[
          'title' => 'Арматура',
          'alias' => 'armatyra'
        ]
      ]);
    }
}
