<?php

namespace App\Modules\OfsSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Ofs;
use App\Modules\OfsSection\Admin\Models\Archive26;
use App\Modules\OfsSection\User\Dto\SynchOfsDto;

class SelectOfsTask extends BaseTask
{   
    /**
     * Получаем месяц из таблицы ofs
     *
     * @param int $id
     * @return array
     */
    public function SelectMounth(int $id): array
    {     
        return Ofs::select('mounth')   
            ->where('user_id', $id)   
            ->first()
            ->toArray();       
    }
    
    /**
     * Получаем информацию из ofs
     *
     * @param int $user, int $chapter
     * @return array
     */
    public function SelectInfo(int $user, int $chapter): array
    {     
        return Ofs::select('ofs.id', 'ofs.user_id', 'ofs.ekr_id', 'ofs.mounth', 'ofs.chapter', 'ofs.status',
                'ofs.lbo', 'ofs.prepaid', 'ofs.credit_year_all', 'ofs.credit_year_term', 'ofs.debit_year_all', 
                'ofs.debit_year_term', 'ofs.fact_mounth', 'ofs.kassa_mounth', 'ofs.credit_end_all', 'ofs.credit_end_term', 
                'ofs.debit_end_all', 'ofs.debit_end_term', 'ofs.return_old_year', 'ofs.fact_all', 'ofs.kassa_all')  
            ->selectRaw('((`credit_year_all` + `fact_all` - `debit_year_all` - `kassa_all`) - '
                    . '(`credit_end_all` - `debit_end_all`) + `return_old_year`) AS total1')
            ->selectRaw('(`lbo` - `fact_all` + `prepaid` - `credit_year_all`) AS total2')
            ->where('user_id', $user)
            ->where('chapter', $chapter) 
            ->join('ekr', 'ofs.ekr_id', '=', 'ekr.id')    
            ->with([
                'ekr', 
                'user:id,name',
            ])   
            ->orderBy('ekr.number', 'asc')
            ->orderBy('ekr.main', 'desc')
            ->orderBy('ekr.shared', 'desc')
            ->orderBy('ekr.title', 'asc')    
            ->get()
            ->toArray();       
    }
    
    /**
     * Получаем информацию из ofs
     * Для последующей синхронизации
     *
     * @param SynchOfsDto $dto
     * @return array
     */
    public function SelectSynch(SynchOfsDto $dto): array
    {     
        return Ofs::select()  
            ->where('user_id', $dto->user_id)  
            ->where('lbo', '!=', 0)    
            ->get()
            ->toArray();       
    }
    
    /**
     * Получаем информацию из Archive26
     * Для последующей синхронизации
     *
     * @param SynchOfsDto $dto
     * @return array
     */
    public function SelectArchive(SynchOfsDto $dto): array
    {     
        return Archive26::select()  
            ->where('user_id', $dto->user_id)  
            ->where('mounth', $dto->mounth)     
            ->get()
            ->toArray();       
    }
}

