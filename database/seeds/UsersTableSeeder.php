<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'login' => 'kuznetsov',
            'rang' => 'Иженер',
            'name' => 'Кузнецов А.А.',
            'email' => 'edds@serov112.ru',
            'birthdate' => '1989-07-11',
            'password' => bcrypt(110789),
            'ip_address' => '127.0.0.1',
        ]);
    }
}
