<?php

namespace App\Modules\UtilitiesSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\UtilitiesSection\Admin\Models\Tarif;

class SelectTarifTask extends BaseTask
{   
    /**
     * Возвращаем таблицу tariffs
     *
     * @param int $year, int $mounth
     * @return array
     */
    public function SelectTariffs(int $year, int $mounth): array
    {     
        return Tarif::select()   
            ->where('year', $year)
            ->where('mounth', $mounth) 
            ->orderBy('id', 'asc')    
            ->get()
            ->toArray();       
    }
}

