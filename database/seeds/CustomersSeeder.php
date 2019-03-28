<?php

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('customers')->insert([
      	[
      		'surname' => 'Сомов',
      		'name' => 'Илья',
      		'patronymic' => 'Васильевич',
      		'email' => 'ilyailya@mail.ru',
      		'address' => 'ул. Советов 14',
      		'login' => 'ilya',
      		'password' => '123456'
      	],[
      		'surname' => 'Колов',
      		'name' => 'Дима',
      		'patronymic' => 'Васильевич',
      		'email' => 'dima@mail.ru',
      		'address' => 'ул. Советов 15',
      		'login' => 'dima',
      		'password' => '123456'
      	],[
          'surname' => 'Дулова',
          'name' => 'Лена',
          'patronymic' => 'Васильевна',
          'email' => 'lena@mail.ru',
          'address' => 'ул. Советов 2',
          'login' => 'lena',
          'password' => '123456'
        ],
      ]);
    }
}
