<?php

namespace App\Modules\OfsSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\OfsSection\Admin\Dto\UpdateRulesDto;
use App\Modules\OfsSection\Admin\Tasks\FinishTask;

class UpdateInfoAction extends BaseAction
{   
    /**
     * Обновляем правила
     * в таблице finish
     *
     * @param UpdateRulesDto $dto
     * @return 
     */
    public function UpdateRules(UpdateRulesDto $dto)
    {   
        $this->task(FinishTask::class)->UpdateInfo(1, $dto->finish);    
        $this->task(FinishTask::class)->UpdateInfo(2, $dto->old); 
    }   
}



