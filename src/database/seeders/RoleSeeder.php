<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->list() as $code=>$name){
            DB::table('roles')->insert([
                'name' => $name,
                'code' => $code,
            ]);
        }
    }

    public function list()
    {
        return [
            'user' => 'Пользователь',
            'admin' => 'Администратор',
            'top' => 'Топ',
            'referee' => 'Судья',
        ];
    }
}
