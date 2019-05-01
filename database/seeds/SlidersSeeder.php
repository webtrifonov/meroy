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
            	'title' => 'Отделочные материалы со скидкой до 25%',
            	'path' => '/category/4',
            	'image' => '1.jpg'
            ],[
                'title' => 'Выгодный weekend!',
                'path' => '/category/1',
                'image' => '2.jpg'
            ],
            [
                'title' => 'Скидка на кирпичи!',
                'path' => '/product/4',
                'image' => '3.jpg'
            ]
        ]);
    }
}
