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
        \App\Models\Category::insert([
            [
                'title' => 'Кирпич',
                'alias' => 'kirpich'
            ],[
                'title' => 'Строительные смеси',
                'alias' => 'smesi'
            ],[
                'title' => 'Бетонные изделия',
                'alias' => 'betonnie_izdeliya'
            ],[
            	'title' => 'Лакокрасочные материалы',
                'alias' => 'kraski'
            ],[
            	'title' => 'Отделочные материалы',
                'alias' => 'otdelochnye_materiali'
            ],[
            	'title' => 'Плитка',
                'alias' => 'plitka'
            ],[
                'title' => 'Утеплители',
                'alias' => 'yteplitely'
            ],[
                'title' => 'Крепеж',
                'alias' => 'krepegh'
            ],[
                'title' => 'Арматура',
                'alias' => 'armatyra'
            ]
        ]);
    }
}
