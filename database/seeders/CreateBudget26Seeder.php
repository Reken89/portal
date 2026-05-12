<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateBudget26Seeder extends Seeder
{
    public function run()
    {
        $users = [
            9, 10, 13,
            15, 18, 19, 8,
            36, 23, 37, 38, 35,
            27, 28, 29, 26,
            53, 54, 55, 56, 57,
            58, 59, 60, 61, 62,
            63, 64, 65, 66, 67,
            68, 73, 74, 77, 78
        ];
        
        $fuData = [];
        $cbData = [];
        foreach ($users as $user) {
            $fuData[$user] = [
                'sum_fu'  => 0,
                'date_fu' => date('Y-m-d'),
            ];
            
            $cbData[$user] = [
                'sum_cb'  => 0,
                'date_cb' => date('Y-m-d'),
            ];
        }
        
        for($year = 2027; $year < 2030; $year++){    
            for($ekr = 1; $ekr < 245; $ekr++){
                $toInsert[] = [
                    'ekr_id'  => $ekr,
                    'year'    => $year,
                    'data_fu' => json_encode($fuData),
                    'data_cb' => json_encode($cbData),
                ];
                
                // Чтобы не переполнить память, вставляем пачками по 100 штук
                if (count($toInsert) >= 100) {
                    DB::table('budget26')->insert($toInsert);
                    $toInsert = [];
                }
            }
        }
        
        // Довставляем остатки
        if (!empty($toInsert)) {
            DB::table('budget26')->insert($toInsert);
        }
    }
}
