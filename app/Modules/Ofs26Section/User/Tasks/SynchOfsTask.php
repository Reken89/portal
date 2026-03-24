<?php

namespace App\Modules\Ofs26Section\User\Tasks;

use App\Core\Tasks\BaseTask;
use Illuminate\Support\Facades\DB;
use App\Modules\Ofs26Section\User\Dto\SynchOfsDto;

class SynchOfsTask extends BaseTask
{   
    /**
     * Синхронизируем информацию в таблице ofs26
     *
     * @param SynchOfsDto $dto
     * @return bool
     */
    public function SynchInfo(SynchOfsDto $dto)
    {   
        DB::transaction(function () use ($dto) {
            $result = DB::table('ofs26')
            ->select(
                'id', 'user_id', 'ekr_id', 'mounth', 'chapter', 'status',
                'lbo', 'prepaid', 'credit_year_all', 'credit_year_term', 
                'debit_year_all', 'debit_year_term',                
                'return_old_year', 'fact_all', 'kassa_all',
            )
            ->selectRaw('(lbo - fact_all + prepaid - credit_year_all) AS total2')        
            ->where('user_id', $dto->user_id)
            ->where('mounth', $dto->mounth-1)
            ->where('chapter', $dto->chapter[0])
            ->get()
            ->map(function ($item) {
                return (array) $item; // Принудительно кастим объект в массив
            })
            ->toArray(); 

            foreach ($result as $info){
            if($info['total2'] == 0 AND $info['lbo'] == 0){
                //Заглушка
                }else{
                    DB::table('ofs26')
                    ->where('user_id', $info['user_id'])
                    ->where('mounth', $dto->mounth)
                    ->where('chapter', $info['chapter'])
                    ->where('ekr_id', $info['ekr_id'])
                    ->update([                
                        'lbo'              => $info['lbo'],
                        'prepaid'          => $info['prepaid'],
                        'credit_year_all'  => $info['credit_year_all'],
                        'credit_year_term' => $info['credit_year_term'],
                        'debit_year_all'   => $info['debit_year_all'],
                        'debit_year_term'  => $info['debit_year_term'],
                        'fact_all'         => $info['fact_all'],
                        'fact_mounth'      => 0,
                        'kassa_all'        => $info['kassa_all'],
                        'kassa_mounth'     => 0,
                        'credit_end_all'   => 0,
                        'credit_end_term'  => 0,
                        'debit_end_all'    => 0,
                        'debit_end_term'   => 0,
                        'return_old_year'  => $info['return_old_year'],
                    ]);
                }    
            }
        });  
    }    
}






