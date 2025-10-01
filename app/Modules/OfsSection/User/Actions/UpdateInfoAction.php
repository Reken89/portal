<?php

namespace App\Modules\OfsSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\OfsSection\User\Dto\UpdateOfsDto;
use App\Modules\OfsSection\User\Tasks\UpdateOfsTask;

class UpdateInfoAction extends BaseAction
{   
    /**
     * Обновляем значения в ofs
     *
     * @param UpdateOfsDto $dto
     * @return 
     */
    public function UpdateOfs(UpdateOfsDto $dto)
    {   
        $this->task(UpdateOfsTask::class)->UpdateLine($dto);    
        $this->task(UpdateOfsTask::class)->UpdateSvod($dto, $dto->main_id); 
        if($dto->number >= 17 && $dto->number <=42 || $dto->number == 45){
            $this->task(UpdateOfsTask::class)->UpdateSvod($dto, $dto->shared_id); 
        }
    }   
}


