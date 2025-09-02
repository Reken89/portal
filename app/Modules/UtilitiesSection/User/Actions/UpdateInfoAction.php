<?php

namespace App\Modules\UtilitiesSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\UtilitiesSection\User\Dto\UpdateUtilitiesDto;
use App\Modules\UtilitiesSection\User\Tasks\UpdateUtilitiesTask;

class UpdateInfoAction extends BaseAction
{   
    /**
     * Обновляем значения в таблице utilities
     *
     * @param UpdateUtilitiesDto $dto
     * @return 
     */
    public function UpdateUtilities(UpdateUtilitiesDto $dto)
    {   
        $this->task(UpdateUtilitiesTask::class)->UpdateUtilities($dto);    
    }    
}

