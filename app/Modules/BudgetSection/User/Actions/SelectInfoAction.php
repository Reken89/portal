<?php

namespace App\Modules\BudgetSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\BudgetSection\Admin\Models\Budget26;

class SelectInfoAction extends BaseAction
{         
    /**
     * Получаем информацию из таблицы budget26
     *
     * @param int $year
     * @return array
     */
    public function selectBudget(int $year): array
    {   
        return Budget26::select('budget26.*')
            ->where('budget26.year', $year)
            ->join('ekr', 'budget26.ekr_id', '=', 'ekr.id')  
            ->with('ekr:id,shared,main,number,title,ekr')     
            ->orderBy('ekr.number', 'asc')
            ->orderBy('ekr.main', 'desc')
            ->orderBy('ekr.shared', 'desc')
            ->orderBy('ekr.title', 'asc')
            ->get()
            ->append('data') // Добавляем наше виртуальное поле в результат
            ->toArray();
    }
}


