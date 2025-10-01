<?php

namespace App\Modules\OfsSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Ofs;
use App\Modules\OfsSection\User\Dto\UpdateOfsDto;

class UpdateOfsTask extends BaseTask
{   
    /**
     * Обновляем строку в ofs
     *
     * @param UpdateOfsDto $dto
     * @return bool
     */
    public function UpdateLine(UpdateOfsDto $dto): bool
    {    
        ofs::where('id', $dto->id)    
            ->where('fact_mounth', '!=', $dto->fact_mounth)    
            ->update([
                'fact_all' => ofs::raw("fact_all - $dto->fact_mounth_old + $dto->fact_mounth"),
            ]); 
        
        ofs::where('id', $dto->id)
            ->where('kassa_mounth', '!=', $dto->kassa_mounth)
            ->update([
                'kassa_all' => ofs::raw("kassa_all - $dto->kassa_mounth_old + $dto->kassa_mounth"),
            ]); 
        
        return Ofs::find($dto->id)
            ->update([                
                'lbo'              => $dto->lbo,
                'prepaid'          => $dto->prepaid,
                'credit_year_all'  => $dto->credit_year_all,
                'credit_year_term' => $dto->credit_year_term,
                'debit_year_all'   => $dto->debit_year_all,
                'debit_year_term'  => $dto->debit_year_term,
                'fact_mounth'      => $dto->fact_mounth,
                'kassa_mounth'     => $dto->kassa_mounth,
                'credit_end_all'   => $dto->credit_end_all,
                'credit_end_term'  => $dto->credit_end_term,
                'debit_end_all'    => $dto->debit_end_all,
                'debit_end_term'   => $dto->debit_end_term,
                'return_old_year'  => $dto->return_old_year,
            ]);    
    }
    
     /**
     * Обновляем строку в ofs
     * В зависимости от выбора
     * main или shared
     *
     * @param UpdateOfsDto $dto, int $id
     * @return bool
     */
    public function UpdateSvod(UpdateOfsDto $dto, int $id): bool
    {    
        if($dto->fact_mounth !== $dto->fact_mounth_old){
            ofs::where('id', $id)     
            ->update([
                'fact_all' => ofs::raw("fact_all - $dto->fact_mounth_old + $dto->fact_mounth"),
                'fact_mounth' => ofs::raw("fact_mounth - $dto->fact_mounth_old + $dto->fact_mounth"),
            ]); 
        }
        if($dto->kassa_mounth !== $dto->kassa_mounth_old){
            ofs::where('id', $id)
            ->update([
                'kassa_all' => ofs::raw("kassa_all - $dto->kassa_mounth_old + $dto->kassa_mounth"),
                'kassa_mounth' => ofs::raw("kassa_mounth - $dto->kassa_mounth_old + $dto->kassa_mounth"),
            ]);           
        }
        
        return Ofs::find($id)
            ->update([                
                'lbo'              => ofs::raw("lbo - $dto->lbo_old + $dto->lbo"),
                'prepaid'          => ofs::raw("prepaid - $dto->prepaid_old + $dto->prepaid"),
                'credit_year_all'  => ofs::raw("credit_year_all - $dto->credit_year_all_old + $dto->credit_year_all"),
                'credit_year_term' => ofs::raw("credit_year_term - $dto->credit_year_term_old + $dto->credit_year_term"),
                'debit_year_all'   => ofs::raw("debit_year_all - $dto->debit_year_all_old + $dto->debit_year_all"),
                'debit_year_term'  => ofs::raw("debit_year_term - $dto->debit_year_term_old + $dto->debit_year_term"),
                'credit_end_all'   => ofs::raw("credit_end_all - $dto->credit_end_all_old + $dto->credit_end_all"),
                'credit_end_term'  => ofs::raw("credit_end_term - $dto->credit_end_term_old + $dto->credit_end_term"),
                'debit_end_all'    => ofs::raw("debit_end_all - $dto->debit_end_all_old + $dto->debit_end_all"),
                'debit_end_term'   => ofs::raw("debit_end_term - $dto->debit_end_term_old + $dto->debit_end_term"),
                'return_old_year'  => ofs::raw("return_old_year - $dto->return_old_year_old + $dto->return_old_year"),
            ]);    
    }
}

