<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tag::create([
            'name' => 'Серов-112',
        ]);
        \App\Tag::create([
            'name' => 'Безопасный город',
        ]);
        \App\Tag::create([
            'name' => 'Грифон',
        ]);
        \App\Tag::create([
            'name' => 'Прогнозы',
        ]);
        \App\Tag::create([
            'name' => 'Экскурсии',
        ]);
        \App\Tag::create([
            'name' => 'Оповещение',
        ]);
        \App\Tag::create([
            'name' => 'Проверки',
        ]);
    }
}
