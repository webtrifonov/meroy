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
      \App\Models\Product::insert([
      	[
      		'title' => 'Бордюр «Эквилибрио» 30х6.2 см',
      		'description' => 'Бордюр «Эквилибрио» размером 30х6,2 см в холодных голубых оттенках со строгим ромбовидным узором призван завершать изысканный ансамбль, созданный керамической плиткой этой же коллекции в вашей ванной комнате. Фриз будет изящно окаймлять панно из керамики, одновременно украшая его. Бордюр «Эквилибрио» устойчив к воздействию атмосферных явлений; он не теряет цвет под солнцем, от влаги или мороза.',
      		'images' => '["https://s.leroymerlin.ru/upload/catalog/img/6/d/17455407/800x800/17455407.jpg?v=1244","https://s.leroymerlin.ru/upload/catalog/img/6/d/17455407/800x800/17455407_i.jpg?v=1244", "https://s.leroymerlin.ru/upload/catalog/img/6/d/17455407/800x800/17455407_i_01.jpg?v=1244"]',
      		'price' => 154,
      		'property_set' => '["Цвет","Ширина","Высота","Глубина"]',
      		'value_set' => '["Голубой","60см","50см","5мм"]',
            'alias' => 'ekvilibrio',
      		'currency_id' => 2,
      		'category_id' => 5,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
      	],[
      		'title' => 'Бордюр «Орхидея G» 40х6 см',
      		'description' => 'Декоративный бордюр «Орхидея G» — это незаменимый элемент для завершения декора стен в ванной комнате. Небольшие плитки (40х6 см) подарят стене законченность и потрясающий эффект райского сада. Прекрасные цветы нежного розового цвета изображены настолько искусно, что передают всю прелесть живых королев тропических джунглей. При всей своей прочности и долговечности, каждая плитка имеет совсем небольшой вес — 0,4 кг. Простота укладки плитки делает ее популярной у покупателей.',
      		'images' => '["https://s.leroymerlin.ru/upload/catalog/img/0/a/17101123/800x800/17101123.jpg?v=1244","https://s.leroymerlin.ru/upload/catalog/img/0/a/17101123/800x800/17101123_01.jpg?v=1244"]',
      		'price' => 95,
      		'property_set' => '["Цвет","Ширина","Высота","Глубина"]',
      		'value_set' => '["Голубой","50см","50см","9мм"]',
            'alias' => 'orhideya',
      		'currency_id' => 2,
      		'category_id' => 5,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
      	],[
      		'title' => 'Краска водно-дисперсионная цвет белый 2.5 кг',
      		'description' => 'Водно-дисперсионная краска для потолков отличается не только приятным матово-белым цветом, но и высоким уровнем сопротивления к повышенному уровню влажности в помещении. По сравнению с другими красками данная модель не имеет резкого запаха, а также она очень быстро высыхает. Изделие обладает высокой укрывистостью, при желании цвет можно менять при помощи обычных колеров. Тара герметично закрывается при помощи крышки, а также имеет удобную железную ручку.',
      		'images' => '["https://res.cloudinary.com/lmru/image/upload/f_auto,q_auto,b_white,d_photoiscoming.png/LMCode/15360501.jpg","https://res.cloudinary.com/lmru/image/upload/f_auto,q_auto,b_white,d_photoiscoming.png/LMCode/15360501_01.jpg"]',
      		'price' => 65,
      		'property_set' => '["Цвет","Объем"]',
      		'value_set' => '["Красная","1 литр"]',
            'alias' => 'kraska_belaya',
      		'currency_id' => 2,
      		'category_id' => 3,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
      	],[
              'title' => 'Кирпич Гуковский забутовочный М-100',
              'description' => 'Кирпич рядовой полусухого прессования, марка М-100',
              'imagepath' => '["https://vsrostov.ru/sites/default/files/m-100-125.png", "https://vsrostov.ru/sites/default/files/paste_1514389754.png"]',
              'price' => 9,
              'property_set' => '["Марка по прочности","Размеры", "Масса одного кирпича", "Водопоглощение", "Пустотность", "Морозостойкость"]',
              'value_set' => '["М100","250х120х65 мм", "3,1 кг", "13-15 %", "8%", "F 25"]',
              'alias' => 'kirpich-m-100',
              'currency_id' => 2,
              'category_id' => 7,
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now(),
          ],[
      		'title' => 'Сайдинг ПВХ брус 2700х203 мм желтый, 0.548 м2',
      		'description' => 'Водно-дисперсионная краска для потолков отличается не только приятным матово-белым цветом, но и высоким уровнем сопротивления к повышенному уровню влажности в помещении. По сравнению с другими красками данная модель не имеет резкого запаха, а также она очень быстро высыхает. Изделие обладает высокой укрывистостью, при желании цвет можно менять при помощи обычных колеров. Тара герметично закрывается при помощи крышки, а также имеет удобную железную ручку.',
      		'imagepath' => '["https://s.leroymerlin.ru/upload/catalog/img/7/0/81932467/800x800/81932467_02.jpg?v=1244"]',
      		'price' => 100,
      		'property_set' => '["Цвет","Материал"]',
      		'value_set' => '["Бежевый","Пластик"]',
            'alias' => 'saiding_pvh',
      		'currency_id' => 2,
      		'category_id' => 3,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
      	],[
          'title' => 'Бетонное ограждение для парковки «Столбик»',
          'description' => 'Бетонно-монолитный ограничитель с фактурой из натурального камня. Изделие выполнено в виде цилиндра с круглой верхней частью. На основание из высококачественного бетона нанесено декоративное покрытие. Внешний фасад ограждения имеет фактуру: гранит, галька фракция от 3-15мм. ',
          'imagepath' => '["https://vsrostov.ru/sites/default/files/styles/uc_product/public/img-20180220-wa0018_0.jpg?itok=oc4OTH65"]',
          'price' => 4000,
          'property_set' => '["Высота", "Основание", "Вес"]',
          'value_set' => '["60см","35*35см", "120кг"]',
          'alias' => 'parkovochnoe-ograzhdenie-stolbik',
          'currency_id' => 1,
          'category_id' => 7,
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now(),
        ],[
          'title' => 'Вазон (цветник) из бетона 60x60СМ; H-40см',
          'description' => 'Цветник из бетона с фактурой камня или гальки являются одним из самых популярных украшений не только для сада, но и для официальных зданий. Бетонно-монолитный цветник с фактурой из натурального камня.  Внешний фасад цветника может иметь фактуру: гранит, галька фракция от 3мм до 15мм. ',
          'imagepath' => '["https://vsrostov.ru/sites/default/files/styles/uc_product/public/img-20180220-wa0006.jpg"]',
          'price' => 6000,
          'property_set' => '["Длина", "Ширина", "Высота", "Вес"]',
          'value_set' => '["600мм","600мм", "400мм", "140кг"]',
          'alias' => 'cvetnik-60h60h40-sm',
          'currency_id' => 1,
          'category_id' => 7,
          'created_at' => \Carbon\Carbon::now(),
           'updated_at' => \Carbon\Carbon::now(),
        ],[
          'title' => 'Пеноплэкс',
          'description' => 'Утепление наружных стен – одна из основных задач по теплоизоляции здания. Именно через плохо изолированные стены, в зависимости от конструкции, дом теряет до 45% тепла. Именно поэтому необходимо выбрать качественный утеплитель: устойчивый к деформациям, экологичный, влагостойкий с максимальной способностью теплозащиты. Применение теплоизоляционных плит ПЕНОПЛЭКС СТЕНА® (соответствуют старому типу ПЕНОПЛЭКС 31 с антипиренами) - это наиболее эффективный способ сбережения тепла и экономии на оплате электроэнергии или других видов топлива',
          'imagepath' => '["https://vsrostov.ru/sites/default/files/pack_stena1_4.jpg"]',
          'price' => 110,
          'property_set' => '["Плотность","Водопоглощение за 24 часа, не более", "Коэффициент теплопроводности при (25±5) °С", "Стандартные размеры"]',
          'value_set' => '["25-32кг/м^3", "0.4", "0.030 Вт/м*К", "1200*600*30"]',
          'alias' => 'penopleks1',
          'currency_id' => 2,
          'category_id' => 8,
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now(),
        ]
      ]);
    }
}
