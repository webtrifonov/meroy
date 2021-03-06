<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::insert([
        [
            'name' => 'Вася',
            'email' => 'vasu@mail.ru',
            'theme' => 'Привет, я Вася',
            'message' => 'Хочу пожелать хорошего дня',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ],[
            'name' => 'Петя',
            'email' => 'petu@mail.ru',
            'theme' => 'Хай, я Петя',
            'message' => 'Хочу пожелать удачи',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]
      ]);
    }
}
