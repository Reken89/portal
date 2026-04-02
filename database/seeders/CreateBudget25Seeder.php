<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateBudget25Seeder extends Seeder
{
    public function run()
{
    // 1. Берем ВСЕ данные одним махом 
    $allData = DB::table('counts25')
        ->whereBetween('year', [2026, 2028])
        ->get()
        ->groupBy(['ekr_id', 'year']); // Группируем по двум полям сразу

    $toInsert = [];

    foreach ($allData as $ekrId => $years) {
        foreach ($years as $year => $items) {
            
            $jsonData = [];
            foreach ($items as $item) {
                $jsonData[$item->user_id] = [
                    'sum_fu'  => $item->sum_fu,
                    'sum_cb'  => $item->sum_cb,
                    'date_fu' => $item->date_fu,
                    'date_cb' => $item->date_cb,
                ];
            }

            $toInsert[] = [
                'ekr_id' => $ekrId,
                'year'   => $year,
                'data'   => json_encode($jsonData),
            ];
            
            // Чтобы не переполнить память, вставляем пачками по 100 штук
            if (count($toInsert) >= 100) {
                DB::table('budget25')->insert($toInsert);
                $toInsert = [];
            }
        }
    }

    // Довставляем остатки
    if (!empty($toInsert)) {
        DB::table('budget25')->insert($toInsert);
    }
}
}

