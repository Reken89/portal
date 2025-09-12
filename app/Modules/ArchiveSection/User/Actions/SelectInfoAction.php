<?php

namespace App\Modules\ArchiveSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\ArchiveSection\User\Tasks\SelectParametersTask;
use App\Modules\ArchiveSection\User\Tasks\SelectOfsTask;

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
    
    /**
     * Получаем значения ОФС
     *
     * @param int $id
     * @return array
     */
    public function SelectOfs(int $id): array
    {   
        $parameters = $this->task(SelectParametersTask::class)->SelectLine($id); 
        return $this->task(SelectOfsTask::class)->SelectAll($parameters['year'], $parameters['mounth'], $parameters['user_id'], json_decode($parameters['chapter'])); 
    }  
}

