<?php

namespace Database\Seeders;

use App\Modules\ArchiveSection\Admin\Models\Ekr;
use Illuminate\Database\Seeder;

class AddLineEkrSeeder extends Seeder
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
            3, 4, 5, 7, 8,
            9, 10, 13, 15,
            16, 17, 18, 19, 21, 21,
            23, 25, 26, 27, 28, 29
            ];
        
        // Добавляем значения в таблице Ekr
        $ekr = Ekr::create([
            'shared' => 'No',
            'main'   => 'No',
            'number' => 24,
            'ekr'    => 264,
            'title'  => 'Пособие по временной нетрудоспособности бывшим работникам',
        ]);
        
        // Через связи добавляем значение в таблицу Ofs
        foreach ($users as $user) {
            for ($chapter = 1; $chapter < 6; $chapter++){
                $ekr->ofs()->create([
                    'user_id'          => $user,
                    'mounth'           => 1,
                    'chapter'          => $chapter,
                    'status'           => 1,
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
                ]);
            }                                                        
        }
        
        // Через связи добавляем значение в таблицу archive26
        foreach ($users as $user) {
            for ($mounth = 1; $mounth < 13; $mounth++){
                for ($chapter = 1; $chapter < 6; $chapter++){
                    $ekr->archive26()->create([
                        'user_id'          => $user,
                        'mounth'           => $mounth,
                        'chapter'          => $chapter,
                        'status'           => 1,
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
                    ]);
                } 
            }
        }
    }       
}
