<?php

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Organization::create([
            'name' => 'Муниципальное бюджетное учреждение "Управление гражданской защиты Серовского городского округа"',
            'short_name' => 'МБУ "УГЗ СГО"',
            'email' => 'info@serov112.ru',
            'address' => 'г. Серов, ул. Загородка, 12',
            'coordinates' => '60.58064,59.593290',
        ]);
        \App\Organization::create([
            'name' => 'Администрация Серовского городского округа',
            'short_name' => 'АСГО"',
            'email' => 'info@adm-serov.ru',
            'address' => 'г. Серов, ул. Ленина, 140',
            'coordinates' => '60.58064,59.593290',
        ]);
    }
}
