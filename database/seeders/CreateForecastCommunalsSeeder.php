<?php

namespace Database\Seeders;

use App\Modules\ForecastSection\Admin\Models\ForecastCommunal;
use Illuminate\Database\Seeder;

class CreateForecastCommunalsSeeder extends Seeder
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
            3, 4, 5, 7, 8, 9, 10, 13, 15, 16, 17, 18, 19, 20, 21, 23,
        ];
                
        //Добавляем значения в таблицу communal
        foreach ($users as $user) {
            ForecastCommunal::create([
                'user_id'         => $user,
                'year'            => 2026,
                'sum_budget_h1'   => 0,
                'sum_business_h1' => 0,
                'sum_budget_h2'   => 0,
                'sum_business_h2' => 0,               
                'vol_budget_h1'   => 0,
                'vol_business_h1' => 0,
                'vol_budget_h2'   => 0,
                'vol_business_h2' => 0,
            ]);                                                                      
        }
    }       
}
