<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->list() as $name){
            DB::table('offices')->insert([
                'name' => $name,
                'rating' => 0,
            ]);
        }
    }

    public function list()
    {
        return [
            'boston' => 'Бостон',
            'kazan' => 'Казань',
            'ulyanovsk' => 'Ульяновск',
            'saransk' => 'Саранск',
            'dimitrovgrad' => 'Димитровград',
            'samara' => 'Самара',
            'krasnodar' => 'Краснодар',
        ];
    }
}
