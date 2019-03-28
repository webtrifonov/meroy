<?php

use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
        [
            'name' => 'Вася',
            'email' => 'vasu@mail.ru',
            'theme' => 'Привет, я Вася',
            'message' => 'Хочу пожелать хорошего дня'
        ],[
            'name' => 'Петя',
            'email' => 'petu@mail.ru',
            'theme' => 'Хай, я Петя',
            'message' => 'Хочу пожелать удачи'
        ]
      ]);
    }
}
