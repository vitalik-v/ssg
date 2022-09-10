<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->list() as $code=>$name){
            DB::table('event_statuses')->insert([
                'name' => $name,
                'code' => $code,
            ]);
        }
    }

    public function list()
    {
        return [
            'unpublished' => 'Неопубликован',
            'published' => 'Опубликован',
        ];
    }
}
