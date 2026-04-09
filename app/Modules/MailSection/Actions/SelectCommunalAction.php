<?php

namespace App\Modules\MailSection\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\UtilitiesSection\Admin\Models\Utilities;

class SelectCommunalAction extends BaseAction
{      
    /**
     * Получаем массив
     *
     * @param array $months, int $year
     * return array
     */
    public function selectInfo(array $months, int $year): array
    {   
        return Utilities::select(['id', 'user_id', 'year', 'mounth', 'status'])
            ->with(['user:id,name'])     
            ->where('year', $year)
            ->whereIn('mounth', $months) 
            ->whereIn('status', [2, 3])     
            ->get()
            ->toArray(); 
    } 
}

