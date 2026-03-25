<?php

namespace App\Modules\Ofs26Section\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Ofs26Section\User\Dto\UpdateOfsDto;
use App\Modules\Ofs26Section\User\Dto\SynchOfsDto;
use App\Modules\Ofs26Section\User\Tasks\UpdateOfsTask;
use App\Modules\Ofs26Section\User\Tasks\SynchOfsTask;

class UpdateInfoAction extends BaseAction
{   
    /**
     * Обновляем значения в ofs
     *
     * @param UpdateOfsDto $dto
     * @return 
     */
    public function UpdateOfs(UpdateOfsDto $dto): bool
    {   
        return $this->task(UpdateOfsTask::class)->UpdateInfo($dto);    
    }   
    
    /**
     * Синхронизация ОФС
     *
     * @param SynchOfsDto $dto
     * @return 
     */
    public function SynchOfs(SynchOfsDto $dto)
    {   
        $this->task(SynchOfsTask::class)->SynchInfo($dto);           
    } 
    
    /**
     * Обновляем статус
     *
     * @param SynchOfsDto $dto
     * @return 
     */
    public function updateStatus(SynchOfsDto $dto)
    {   
        return $this->task(UpdateOfsTask::class)->UpdateStatus($dto);           
    } 
}



