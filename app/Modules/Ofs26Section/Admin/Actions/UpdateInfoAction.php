<?php

namespace App\Modules\Ofs26Section\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Ofs26Section\Admin\Dto\UpdateOfsStatusDto;
use App\Modules\Ofs26Section\Admin\Tasks\UpdateOfsTask;
use App\Modules\Ofs26Section\Admin\Tasks\CounterTask;

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
    
    /**
     * Обновляем статистику
     *
     * @param int $id
     * @return bool
     */
    public function updateCounter(int $id): bool
    {   
        return $this->task(CounterTask::class)->updateInfo($id);           
    } 
}

