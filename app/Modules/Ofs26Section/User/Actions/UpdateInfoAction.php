<?php

namespace App\Modules\Ofs26Section\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Ofs26Section\User\Dto\UpdateOfsDto;
use App\Modules\Ofs26Section\User\Tasks\UpdateOfsTask;

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
        $this->task(UpdateOfsTask::class)->UpdateInfo($dto);    
    }   
}



