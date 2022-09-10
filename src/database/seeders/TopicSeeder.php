<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Наполнение таблицы Темы
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->list() as $code=>$name){
            DB::table('topics')->insert([
                'name' => $name,
                'code' => $code,
            ]);
        }
    }

    public function list()
    {
        return [
            'ecology' => 'Экология',
            'esg' => 'ESG',
            'social_responsibility' => 'Социальная ответственнось',
            'control' => 'Управление',
            'employee_training' => 'Обучение сотрудников',
        ];
    }
}
