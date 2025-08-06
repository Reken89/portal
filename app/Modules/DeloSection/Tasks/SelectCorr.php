<?php

namespace App\Modules\DeloSection\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\DeloSection\Models\Correspondent;

class SelectCorr extends BaseTask
{
    /**
     * Возвращает таблицу correspondents
     *
     * @param
     * @return
     */
    public function SelectAll()
    {
        $result = Correspondent::select()  
            ->orderBy('title', 'asc')     
            ->get()
            ->toArray();
        return $result;
    }
}  

