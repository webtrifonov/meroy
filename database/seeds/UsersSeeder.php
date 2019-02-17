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
    	DB::table('users')->insert([
    		[
    			'login' => 'User1',
    			'surname' => 'Иванов',
    			'name' => 'Иван',
    			'patronymic' => 'Иванович',
    			'email' => 'User1@mail.ru',
    			'password' => '$2y$10$48IWObWVOFcps.J0uYLL6OqqfLulgR4p9k4gVlSsr1fOlSsMpwoWO'
    		]
    	]);
    }
}
