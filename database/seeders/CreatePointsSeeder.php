<?php

namespace Database\Seeders;

use App\Modules\UtilitiesSection\Admin\Models\Point;
use Illuminate\Database\Seeder;

class CreatePointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id из таблицы users
        $users = [
            3, 4, 5, 7, 8, 9, 10, 13, 15, 
            16, 17, 18, 19, 20, 21, 23,
        ];
                
        //Добавляем значения в таблицу communal
        foreach ($users as $user) {
            Point::create([
                'user_id' => $user,
                'mounth'  => '05',
                'points'  => 0,
            ]);                                                        
        }
    }       
}

