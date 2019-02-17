<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*
    	*	https://leroymerlin.ru/product/bordyur-vinole-6-3h20-sm-18630713/
		*	https://leroymerlin.ru/product/bordyur-orhideya-g-40h6-sm-17101123/
		*	https://leroymerlin.ru/product/kraska-vodno-dispersionnaya-cvet-belyy-2-5-kg-17664292/
		*	
    	*/
      DB::table('products')->insert([
      	[
      		'title' => 'Бордюр «Эквилибрио» 30х6.2 см',
      		'description' => 'Бордюр «Эквилибрио» размером 30х6,2 см в холодных голубых оттенках со строгим ромбовидным узором призван завершать изысканный ансамбль, созданный керамической плиткой этой же коллекции в вашей ванной комнате. Фриз будет изящно окаймлять панно из керамики, одновременно украшая его. Бордюр «Эквилибрио» устойчив к воздействию атмосферных явлений; он не теряет цвет под солнцем, от влаги или мороза.',
      		'images' => '["https://s.leroymerlin.ru/upload/catalog/img/6/d/17455407/800x800/17455407.jpg?v=1244","https://s.leroymerlin.ru/upload/catalog/img/6/d/17455407/800x800/17455407_i.jpg?v=1244", "https://s.leroymerlin.ru/upload/catalog/img/6/d/17455407/800x800/17455407_i_01.jpg?v=1244"]',
      		'price' => 154,
      		'totalcount' => 3100,
      		'property_set' => '["Цвет","Ширина","Высота","Глубина"]',
      		'value_set' => '["Голубой","60см","50см","5мм"]',
          'alias' => 'ekvilibrio',
      		'currency_id' => 2,
      		'category_id' => 5,
      	],[
      		'title' => 'Бордюр «Орхидея G» 40х6 см',
      		'description' => 'Декоративный бордюр «Орхидея G» — это незаменимый элемент для завершения декора стен в ванной комнате. Небольшие плитки (40х6 см) подарят стене законченность и потрясающий эффект райского сада. Прекрасные цветы нежного розового цвета изображены настолько искусно, что передают всю прелесть живых королев тропических джунглей. При всей своей прочности и долговечности, каждая плитка имеет совсем небольшой вес — 0,4 кг. Простота укладки плитки делает ее популярной у покупателей.',
      		'images' => '["https://s.leroymerlin.ru/upload/catalog/img/0/a/17101123/800x800/17101123.jpg?v=1244","https://s.leroymerlin.ru/upload/catalog/img/0/a/17101123/800x800/17101123_01.jpg?v=1244"]',
      		'price' => 95,
      		'totalcount' => 350,
      		'property_set' => '["Цвет","Ширина","Высота","Глубина"]',
      		'value_set' => '["Голубой","50см","50см","9мм"]',
          'alias' => 'orhideya',
      		'currency_id' => 2,
      		'category_id' => 5,
      	],[
      		'title' => 'Краска водно-дисперсионная цвет белый 2.5 кг',
      		'description' => 'Водно-дисперсионная краска для потолков отличается не только приятным матово-белым цветом, но и высоким уровнем сопротивления к повышенному уровню влажности в помещении. По сравнению с другими красками данная модель не имеет резкого запаха, а также она очень быстро высыхает. Изделие обладает высокой укрывистостью, при желании цвет можно менять при помощи обычных колеров. Тара герметично закрывается при помощи крышки, а также имеет удобную железную ручку.',
      		'images' => '["https://images.inksoft.com/images/products/464/products/22060/Royal/front/500.png","https://images.inksoft.com/images/products/464/products/86306/Black/front/500.png"]',
      		'price' => 65,
      		'totalcount' => 350,
      		'property_set' => '["Цвет","Объем"]',
      		'value_set' => '["Красная","1 литр"]',
          'alias' => 'kraska_belaya',
      		'currency_id' => 2,
      		'category_id' => 3,
      	],[
      		'title' => 'Сайдинг ПВХ брус 2700х203 мм желтый, 0.548 м2',
      		'description' => 'Водно-дисперсионная краска для потолков отличается не только приятным матово-белым цветом, но и высоким уровнем сопротивления к повышенному уровню влажности в помещении. По сравнению с другими красками данная модель не имеет резкого запаха, а также она очень быстро высыхает. Изделие обладает высокой укрывистостью, при желании цвет можно менять при помощи обычных колеров. Тара герметично закрывается при помощи крышки, а также имеет удобную железную ручку.',
      		'imagepath' => '["https://s.leroymerlin.ru/upload/catalog/img/7/0/81932467/800x800/81932467_02.jpg?v=1244"]',
      		'price' => 100,
      		'totalcount' => 350,
      		'property_set' => '["Цвет","Материал"]',
      		'value_set' => '["Бежевый","Пластик"]',
          'alias' => 'saiding_pvh',
      		'currency_id' => 2,
      		'category_id' => 3,
      	]
      ]);
    }
}