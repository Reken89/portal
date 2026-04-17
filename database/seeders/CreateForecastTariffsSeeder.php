<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateForecastTariffsSeeder extends Seeder
{
    public function run()
    {
        $titles = ['heat', 'water', 'drainage', 'power', 'trash', 'negative'];
        
        $data = [];
        $chunkSize = 100; // Оптимальный размер пакета для вставки

        foreach ($titles as $title) {           
            for ($month = 1; $month < 13; $month++) {
                $data[] = [
                    'year'   => 2026,
                    'month' => $month,
                    'tariff' => 1,
                    'title'  => $title,                   
                    'date'   => date('Y-m-d'),
                ];

                // Если накопили 1000 строк, записываем их одним запросом и очищаем массив
                if (count($data) >= $chunkSize) {
                    DB::table('forecast_tariffs')->insert($data);
                    $data = [];
                }
            }           
        }

        // Вставляем остатки, если они есть
        if (!empty($data)) {
            DB::table('forecast_tariffs')->insert($data);
        }
    }
}