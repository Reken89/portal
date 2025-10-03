<?php

namespace App\Modules\OfsSection\User\Actions;

use App\Core\Actions\BaseAction;

class CalculateInfoAction extends BaseAction
{   
    private array $total = [
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
        'total1'           => 0,
        'total2'           => 0,
    ];
    
    /**
     * Считаем итоговые строки
     *
     * @param array $info
     * @return 
     */
    public function SelectTotal(array $info)
    {   
        foreach($info as $value){
            if($value['ekr']['main'] == 'Yes' && $value['ekr']['shared'] == 'No'){
                $this->total['lbo'] = $this->total['lbo'] + $value['lbo'];
                $this->total['prepaid'] = $this->total['prepaid'] + $value['prepaid'];
                $this->total['credit_year_all'] = $this->total['credit_year_all'] + $value['credit_year_all'];
                $this->total['credit_year_term'] = $this->total['credit_year_term'] + $value['credit_year_term'];
                $this->total['debit_year_all'] = $this->total['debit_year_all'] + $value['debit_year_all'];
                $this->total['debit_year_term'] = $this->total['debit_year_term'] + $value['debit_year_term'];
                $this->total['fact_all'] = $this->total['fact_all'] + $value['fact_all'];
                $this->total['fact_mounth'] = $this->total['fact_mounth'] + $value['fact_mounth'];
                $this->total['kassa_all'] = $this->total['kassa_all'] + $value['kassa_all'];
                $this->total['kassa_mounth'] = $this->total['kassa_mounth'] + $value['kassa_mounth'];
                $this->total['credit_end_all'] = $this->total['credit_end_all'] + $value['credit_end_all'];
                $this->total['credit_end_term'] = $this->total['credit_end_term'] + $value['credit_end_term'];
                $this->total['debit_end_all'] = $this->total['debit_end_all'] + $value['debit_end_all'];
                $this->total['debit_end_term'] = $this->total['debit_end_term'] + $value['debit_end_term'];
                $this->total['return_old_year'] = $this->total['return_old_year'] + $value['return_old_year'];
                $this->total['total1'] = $this->total['total1'] + $value['total1'];
                $this->total['total2'] = $this->total['total2'] + $value['total2'];
            }
        }
        return $this->total;
    }   
}


