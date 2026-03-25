<?php

namespace App\Modules\Ofs26Section\User\Tasks;

use App\Core\Tasks\BaseTask;
use Illuminate\Support\Facades\DB;
use App\Modules\Ofs26Section\User\Dto\SynchOfsDto;

class ExamOfsTask extends BaseTask
{   
    /**
     * Проверяем наличие ошибок в таблице ofs
     *
     * @param SynchOfsDto $dto
     * @return bool
     */
    public function ExamInfo(SynchOfsDto $dto)
    {   
        return DB::table('ofs26')
        ->where('user_id', $dto->user_id)
        ->where('mounth', $dto->mounth)
        // Группируем OR-условия в скобки
        ->where(function($query) {
            $query->whereRaw('(credit_year_all + fact_all - debit_year_all - kassa_all) - (credit_end_all - debit_end_all) + return_old_year != 0')
                ->orWhereRaw('lbo - fact_all + prepaid - credit_year_all < 0');
        })       
        ->exists();
    }    
}







