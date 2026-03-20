<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateDBofs26Seeder extends Seeder
{
    public function run()
    {
        $users = [3, 4, 5, 7, 8, 9, 10, 13, 15, 16, 17, 18, 19, 20, 21, 23, 25, 26, 27, 28, 29];
        
        $data = [];
        $chunkSize = 1000; // Оптимальный размер пакета для вставки

        foreach ($users as $user) {
            for ($ekr = 1; $ekr < 246; $ekr++) {
                for ($mounth = 1; $mounth < 13; $mounth++) {
                    for ($chapter = 1; $chapter < 6; $chapter++) {
                        
                        $data[] = [
                            'user_id'          => $user,
                            'ekr_id'           => $ekr,
                            'mounth'           => $mounth,
                            'chapter'          => $chapter,
                            'status'           => 2,
                            'lbo'              => 0,
                            'prepaid'          => 0,
                            'credit_year_all'  => 0,
                            'credit_year_term' => 0,
                            'debit_year_all'   => 0,
                            'debit_year_term'  => 0,
                            'fact_all'         => 0,
                            'fact_mounth'      => 0,
                            'kassa_all'        => 0,
                            'kassa_mounth'     => 0,
                            'credit_end_all'   => 0,
                            'credit_end_term'  => 0,
                            'debit_end_all'    => 0,
                            'debit_end_term'   => 0,
                            'return_old_year'  => 0,
                        ];

                        // Если накопили 1000 строк, записываем их одним запросом и очищаем массив
                        if (count($data) >= $chunkSize) {
                            DB::table('ofs26')->insert($data);
                            $data = [];
                        }
                    }
                }
            }
        }

        // Вставляем остатки, если они есть
        if (!empty($data)) {
            DB::table('ofs26')->insert($data);
        }
    }
}

