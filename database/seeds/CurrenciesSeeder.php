<?php

use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
      	[
      		'title' => 'руб'
      	],[
      		'title' => 'руб/шт'
      	],[
      		'title' => '$'
      	],[
      		'title' => '$/шт'
      	],[
      		'title' => 'руб/кг'
      	],[
      		'title' => 'руб/л'
      	]
      ]);
    }
}
