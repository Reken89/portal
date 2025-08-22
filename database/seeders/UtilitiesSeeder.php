<?php

namespace Database\Seeders;

use App\Modules\UtilitiesSection\Admin\Models\Utilities;
use Illuminate\Database\Seeder;

class UtilitiesSeeder extends Seeder
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
            for ($mounth = 1; $mounth < 13; $mounth++){
                Utilities::create([
                    'date'               => date('Y-m-d'),
                    'user_id'            => $user,
                    'year'               => 2026,
                    'mounth'             => $mounth,
                    'status'             => 2,
                    'mb_volume_heat'     => 0,
                    'pd_volume_heat'     => 0,
                    'mb_sum_heat'        => 0,
                    'pd_sum_heat'        => 0,
                    'mb_volume_drainage' => 0,
                    'pd_volume_drainage' => 0,
                    'mb_sum_drainage'    => 0,
                    'pd_sum_drainage'    => 0,
                    'mb_volume_negative' => 0,
                    'pd_volume_negative' => 0,
                    'mb_sum_negative'    => 0,
                    'pd_sum_negative'    => 0,
                    'mb_volume_water'    => 0,
                    'pd_volume_water'    => 0,
                    'mb_sum_water'       => 0,
                    'pd_sum_water'       => 0,
                    'mb_volume_power'    => 0,
                    'pd_volume_power'    => 0,
                    'mb_sum_power'       => 0,
                    'pd_sum_power'       => 0,
                    'mb_volume_trash'    => 0,
                    'pd_volume_trash'    => 0,
                    'mb_sum_trash'       => 0,
                    'pd_sum_trash'       => 0,
                ]);               
            }                                             
        }
    }       
}

