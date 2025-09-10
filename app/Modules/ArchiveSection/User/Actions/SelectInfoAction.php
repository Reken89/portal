<?php

namespace App\Modules\ArchiveSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\ArchiveSection\User\Tasks\SelectParametersTask;

class SelectInfoAction extends BaseAction
{    
   /**
     * Получаем все запросы
     *
     * @param 
     * @return array
     */
    public function SelectParameters(): array
    {   
        return $this->task(SelectParametersTask::class)->SelectAll();    
    }             
}

