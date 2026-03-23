<?php

namespace App\Modules\Ofs26Section\User\Tasks;

use App\Core\Tasks\BaseTask;
use Illuminate\Support\Facades\DB;

class SelectOfsTask extends BaseTask
{      
    /**
     * Получаем информацию из ofs
     *
     * @param int $user, int $mounth, int $chapter
     * @return array
     */
    public function SelectInfo(int $user, int $mounth, int $chapter): array
    {     
        return DB::table('ofs26')
        ->join('ekr', 'ofs26.ekr_id', '=', 'ekr.id')
        ->join('users', 'ofs26.user_id', '=', 'users.id') // Заменяем with('user') на join
        ->select(
            'ofs26.id', 'ofs26.user_id', 'ofs26.ekr_id', 'ofs26.mounth', 'ofs26.chapter', 'ofs26.status',
            'ofs26.lbo', 'ofs26.prepaid', 'ofs26.credit_year_all', 'ofs26.credit_year_term', 
            'ofs26.debit_year_all', 'ofs26.debit_year_term', 'ofs26.fact_mounth', 'ofs26.kassa_mounth', 
            'ofs26.credit_end_all', 'ofs26.credit_end_term', 'ofs26.debit_end_all', 'ofs26.debit_end_term', 
            'ofs26.return_old_year', 'ofs26.fact_all', 'ofs26.kassa_all',
            'users.name as user_name', // Данные юзера
            'ekr.number', 'ekr.main', 'ekr.shared', 'ekr.title', 'ekr.ekr' // Данные EKR (если нужны в результате)
        )
        ->selectRaw('((ofs26.credit_year_all + ofs26.fact_all - ofs26.debit_year_all - ofs26.kassa_all) - (ofs26.credit_end_all - ofs26.debit_end_all) + ofs26.return_old_year) AS total1')
        ->selectRaw('(ofs26.lbo - ofs26.fact_all + ofs26.prepaid - ofs26.credit_year_all) AS total2')
        ->where('ofs26.user_id', $user)
        ->where('ofs26.mounth', $mounth)
        ->where('ofs26.chapter', $chapter)
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

}




