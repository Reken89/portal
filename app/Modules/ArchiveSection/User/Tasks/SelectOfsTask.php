<?php

namespace App\Modules\ArchiveSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\ArchiveSection\Admin\Models\Archive23;
use App\Modules\ArchiveSection\Admin\Models\Archive24;
use App\Modules\ArchiveSection\Admin\Models\Archive25;
use App\Modules\OfsSection\Admin\Models\Archive26;

class SelectOfsTask extends BaseTask
{
    /**
     * Получаем значения ОФС
     *
     * @param int $year, int $mounth, int $user_id, array $chapter
     * @return array
     */
    public function SelectAll(int $year, int $mounth, int $user_id, array $chapter): array
    {        
        if($year == "2023"){
            $ofs = new Archive23;
            $ekr_id = "archives23.ekr_id";
        }
        if($year == "2024"){
            $ofs = new Archive24;
            $ekr_id = "archives24.ekr_id";
        }
        if($year == "2025"){
            $ofs = new Archive25;
            $ekr_id = "archives25.ekr_id";
        }
        if($year == "2026"){
            $ofs = new Archive26;
            $ekr_id = "archives26.ekr_id";
        }
        
        $info = $ofs::select('ekr_id', 'user_id')
            ->selectRaw('SUM(`lbo`) as lbo')
            ->selectRaw('SUM(`prepaid`) as prepaid')
            ->selectRaw('SUM(`credit_year_all`) as credit_year_all')
            ->selectRaw('SUM(`credit_year_term`) as credit_year_term') 
            ->selectRaw('SUM(`debit_year_all`) as debit_year_all') 
            ->selectRaw('SUM(`debit_year_term`) as debit_year_term')
            ->selectRaw('SUM(`fact_all`) as fact_all')
            ->selectRaw('SUM(`fact_mounth`) as fact_mounth')
            ->selectRaw('SUM(`kassa_all`) as kassa_all') 
            ->selectRaw('SUM(`kassa_mounth`) as kassa_mounth')
            ->selectRaw('SUM(`credit_end_all`) as credit_end_all')
            ->selectRaw('SUM(`credit_end_term`) as credit_end_term')
            ->selectRaw('SUM(`debit_end_all`) as debit_end_all')
            ->selectRaw('SUM(`debit_end_term`) as debit_end_term')
            ->selectRaw('SUM(`return_old_year`) as return_old_year')    
            ->selectRaw('((SUM(`credit_year_all`) + SUM(`fact_all`) - SUM(`debit_year_all`) - SUM(`kassa_all`)) - '
                    . '(SUM(`credit_end_all`) - SUM(`debit_end_all`)) + SUM(`return_old_year`)) AS total1')
            ->selectRaw('(SUM(`lbo`) - SUM(`fact_all`) + SUM(`prepaid`) - SUM(`credit_year_all`)) AS total2')
            ->with([
                'ekr', 
                'user:id,name',
            ])    
            ->where('user_id', $user_id)    
            //->where('year', $year)
            ->where('mounth', $mounth) 
            ->whereIn('chapter', $chapter) 
            ->join('ekr', $ekr_id, '=', 'ekr.id')  
            ->orderBy('ekr.number', 'asc')
            ->orderBy('ekr.main', 'desc')
            ->orderBy('ekr.shared', 'desc')
            ->orderBy('ekr.title', 'asc')  
            ->groupBy(['ekr_id', 'user_id'])    
            ->get()
            ->toArray();
        
        return $info; 
    }  

}

