<?php

namespace App\Modules\BudgetSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\BudgetSection\Admin\Models\Budget25;

class SelectInfoAction extends BaseAction
{      
    /**
     * Получаем информацию из таблицы архива
     *
     * @param int $year
     * @return array
     */
    public function selectArchive(int $year): array
    {   
        return Budget25::select('budget25.*')
            ->where('budget25.year', $year)
            ->join('ekr', 'budget25.ekr_id', '=', 'ekr.id')  
            ->with('ekr:id,shared,main,number,title,ekr')     
            ->orderBy('ekr.number', 'asc')
            ->orderBy('ekr.main', 'desc')
            ->orderBy('ekr.shared', 'desc')
            ->orderBy('ekr.title', 'asc')
            ->get()
            ->toArray();
    } 
}
