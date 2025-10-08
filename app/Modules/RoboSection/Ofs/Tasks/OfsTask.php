<?php

namespace App\Modules\RoboSection\Ofs\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Ofs;

class OfsTask extends BaseTask
{      
    /**
     * Получаем информацию из ofs
     *
     * @param int $user_id
     * @return array
     */
    public function SelectInfo(int $user_id): array 
    {    
        return Ofs::select()  
            ->where('user_id', $user_id)  
            ->where('lbo', '!=', 0)    
            ->get()
            ->toArray();           
    }
    
    /**
     * Обновляем информацию в ofs
     *
     * @param array $info
     * @return
     */
    public function UpdateInfo(array $info)
    {    
        foreach ($info as $inf){
            Ofs::where('user_id', $inf['user_id'])
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
    
    /**
     * Обновляем строки в OFS
     *
     * @param int $user_id
     * @return 
     */
    public function AdjustOfs(int $user_id)
    {    
        Ofs::where('user_id', $user_id)
            ->where('lbo', '!=', 0) 
            ->update([
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
    
    /**
     * Новый месяц для ofs
     *
     * @param 
     * @return 
     */
    public function UpdateMounth()
    {   
        Ofs::where('lbo', '!=', 0)      
            ->update([
                'fact_mounth'     => 0,
                'kassa_mounth'    => 0,
                'credit_end_all'  => 0,
                'credit_end_term' => 0,
                'debit_end_all'   => 0,
                'debit_end_term'  => 0,
            ]);                                          
    }

}
