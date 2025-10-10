<?php

namespace App\Modules\OfsSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\OfsSection\Admin\Tasks\FinishTask;

class SelectInfoAction extends BaseAction
{   
    /**
     * Получаем информацию из таблицы finish
     *
     * @param int $id
     * @return 
     */
    public function SelectRules(int $id)
    {   
        $rules = $this->task(FinishTask::class)->SelectInfo($id);  
        return $rules['date'];
    }   
}

