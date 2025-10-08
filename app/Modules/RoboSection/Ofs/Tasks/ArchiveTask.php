<?php

namespace App\Modules\RoboSection\Ofs\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Archive26;

class ArchiveTask extends BaseTask
{      
    /**
     * Получаем информацию из archive
     *
     * @param int $user_id, int $mounth
     * @return array
     */
    public function SelectInfo(int $user_id, int $mounth): array 
    {    
        return Archive26::select()  
            ->where('user_id', $user_id)  
            ->where('mounth', $mounth) 
            ->where('lbo', '!=', 0) 
            ->get()
            ->toArray();                 
    }
    
    /**
     * Обновляем информацию в archive
     *
     * @param array $info, int $mounth
     * @return
     */
    public function UpdateInfo(array $info, int $mounth)
    {    
        foreach ($info as $inf){
            Archive26::where('user_id', $inf['user_id'])
            ->where('mounth', $mounth)  
            ->where('ekr_id', $inf['ekr_id'])   
            ->where('chapter', $inf['chapter']) 
            ->update([
                'lbo'              => $inf['lbo'],
                'prepaid'          => $inf['prepaid'],
                'credit_year_all'  => $inf['credit_year_all'],
                'credit_year_term' => $inf['credit_year_term'],
                'debit_year_all'   => $inf['debit_year_all'],
                'debit_year_term'  => $inf['debit_year_term'],
                'fact_all'         => $inf['fact_all'],
                'fact_mounth'      => $inf['fact_mounth'],
                'kassa_all'        => $inf['kassa_all'],
                'kassa_mounth'     => $inf['kassa_mounth'],
                'credit_end_all'   => $inf['credit_end_all'],
                'credit_end_term'  => $inf['credit_end_term'],
                'debit_end_all'    => $inf['debit_end_all'],
                'debit_end_term'   => $inf['debit_end_term'],
                'return_old_year'  => $inf['return_old_year'],
            ]);              
        }                  
    }

}

