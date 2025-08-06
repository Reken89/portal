<?php

namespace App\Modules\DeloSection\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\DeloSection\Models\Npa;

class SelectNpa extends BaseTask
{
    /**
     * Возвращает таблицу npa
     *
     * @param
     * @return
     */
    public function SelectAll()
    {
        $result = Npa::select() 
            ->get()
            ->toArray();
        return $result;
    }
}  

