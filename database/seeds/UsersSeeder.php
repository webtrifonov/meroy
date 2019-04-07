<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\Models\User::insert([
    		[
    			'login' => 'User1',
    			'surname' => 'Иванов',
    			'name' => 'Иван',
    			'patronymic' => 'Иванович',
                'role' => \App\Enums\UserRole::getKey(1),
    			'email' => 'User1@mail.ru',
    			'password' => '$2y$10$48IWObWVOFcps.J0uYLL6OqqfLulgR4p9k4gVlSsr1fOlSsMpwoWO'
    		],[
                'login' => 'User2',
                'surname' => 'Петров',
                'name' => 'Петр',
                'patronymic' => 'Иванович',
                'role' => \App\Enums\UserRole::getKey(1),
    			'email' => 'User2@mail.ru',
    			'password' => '$2y$10$48IWObWVOFcps.J0uYLL6OqqfLulgR4p9k4gVlSsr1fOlSsMpwoWO'
    		],[
                'login' => 'User3',
                'surname' => 'Грозный',
                'name' => 'Иван',
                'patronymic' => 'Михайлович',
                'role' => \App\Enums\UserRole::getKey(2),
                'email' => 'User3@mail.ru',
                'password' => '$2y$10$48IWObWVOFcps.J0uYLL6OqqfLulgR4p9k4gVlSsr1fOlSsMpwoWO'
            ]
    	]);
    }
}
