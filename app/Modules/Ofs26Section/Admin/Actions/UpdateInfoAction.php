<?php

namespace App\Modules\Ofs26Section\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Ofs26Section\Admin\Dto\UpdateOfsStatusDto;
use App\Modules\Ofs26Section\Admin\Tasks\UpdateOfsTask;

class UpdateInfoAction extends BaseAction
{      
    /**
     * Обновляем статус
     *
     * @param UpdateOfsStatusDto $dto
     * @return bool
     */
    public function updateStatus(UpdateOfsStatusDto $dto): bool
    {   
        return $this->task(UpdateOfsTask::class)->updateStatus($dto);           
    } 
}

