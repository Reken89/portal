<?php

namespace App\Modules\Ofs26Section\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use Illuminate\Support\Facades\DB;
use App\Modules\Ofs26Section\Admin\Dto\ExportDto;

class SelectOfsTask extends BaseTask
{          
    /**
     * Получаем информацию из ofs
     *
     * @param ExportDto $dto
     * @return array
     */
    public function selectInfo(ExportDto $dto): array
    {     
        return DB::table('ofs26')
        ->join('ekr', 'ofs26.ekr_id', '=', 'ekr.id')
        ->select(
            'ofs26.ekr_id',
            'ekr.number', 'ekr.main', 'ekr.shared', 'ekr.title', 'ekr.ekr' // Данные EKR (если нужны в результате)
        )
        ->selectRaw('SUM(ofs26.lbo) as lbo')
        ->selectRaw('SUM(ofs26.prepaid) as prepaid')
        ->selectRaw('SUM(ofs26.credit_year_all) as credit_year_all')
        ->selectRaw('SUM(ofs26.credit_year_term) as credit_year_term') 
        ->selectRaw('SUM(ofs26.debit_year_all) as debit_year_all') 
        ->selectRaw('SUM(ofs26.debit_year_term) as debit_year_term')
        ->selectRaw('SUM(ofs26.fact_all) as fact_all')
        ->selectRaw('SUM(ofs26.fact_mounth) as fact_mounth')
        ->selectRaw('SUM(ofs26.kassa_all) as kassa_all') 
        ->selectRaw('SUM(ofs26.kassa_mounth) as kassa_mounth')
        ->selectRaw('SUM(ofs26.credit_end_all) as credit_end_all')
        ->selectRaw('SUM(ofs26.credit_end_term) as credit_end_term')
        ->selectRaw('SUM(ofs26.debit_end_all) as debit_end_all')
        ->selectRaw('SUM(ofs26.debit_end_term) as debit_end_term')
        ->selectRaw('SUM(ofs26.return_old_year) as return_old_year')    
        ->selectRaw('((SUM(ofs26.credit_year_all) + SUM(ofs26.fact_all) - SUM(ofs26.debit_year_all) - SUM(ofs26.kassa_all)) - '
                . '(SUM(ofs26.credit_end_all) - SUM(ofs26.debit_end_all)) + SUM(ofs26.return_old_year)) AS total1')
        ->selectRaw('(SUM(ofs26.lbo) - SUM(ofs26.fact_all) + SUM(ofs26.prepaid) - SUM(ofs26.credit_year_all)) AS total2')        

        ->whereIn('ofs26.user_id', $dto->user_id)
        ->whereIn('ofs26.mounth', $dto->month)
        ->whereIn('ofs26.chapter', $dto->chapter)
        ->groupBy(['ofs26.ekr_id', 'ekr.number', 'ekr.main', 'ekr.shared', 'ekr.title', 'ekr.ekr'])        
        ->orderBy('ekr.number', 'asc')
        ->orderBy('ekr.main', 'desc')
        ->orderBy('ekr.shared', 'desc')
        ->orderBy('ekr.title', 'asc')
        ->get()
        ->map(function ($item) {
            return (array) $item; // Принудительно кастим объект в массив
        })
        ->toArray();     
    }
    
    /**
     * Получаем информацию из ofs
     *
     * @param ExportDto $dto
     * @return array
     */
    public function selectMatrix(): array
    {     
        return DB::table('ofs26')
        ->join('users', 'ofs26.user_id', '=', 'users.id')
        ->select('users.name', 'ofs26.user_id', 'ofs26.mounth', 'ofs26.status')
        ->where('ofs26.ekr_id', 1) 
        ->where('ofs26.chapter', 1) 
        ->orderBy('ofs26.user_id')
        ->orderBy('ofs26.mounth')
        ->get()
        ->groupBy('user_id') // Группируем по ID учреждения
        ->map(function ($group) {
            return [
                'name' => $group->first()->name,
                // Превращаем коллекцию статусов в простой массив [status, status, ...]
                'statuses' => $group->pluck('status')->toArray() 
            ];
        })
        ->values() // Сбрасываем ключи user_id, чтобы получить чистый список
        ->toArray();
    }
}






