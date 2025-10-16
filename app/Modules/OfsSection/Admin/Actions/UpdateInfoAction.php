<?php

namespace App\Modules\OfsSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\OfsSection\Admin\Dto\UpdateRulesDto;
use App\Modules\OfsSection\Admin\Dto\SynchOfsDto;
use App\Modules\OfsSection\Admin\Tasks\FinishTask;
use App\Modules\OfsSection\Admin\Tasks\CounterTask;
use App\Modules\OfsSection\Admin\Tasks\ArchiveTask;

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
    
    /**
     * Обновляем счетчик
     *
     * @param 
     * @return 
     */
    public function UpdateCounter()
    {   
        $this->task(CounterTask::class)->UpdateInfo(1);     
    }  
    
    /**
     * Обновляем ofs
     *
     * @param SynchOfsDto $dto
     * @return 
     */
    public function UpdateOfs(SynchOfsDto $dto)
    {   
        $ofs = $this->task(ArchiveTask::class)->SelectInfo($dto->user_id, $dto->mounth); 
        if(!empty($ofs)){
            $this->task(ArchiveTask::class)->UpdateInfo($ofs, $dto->mounth+1);
            return true;
        }else{
            return false;
        }
    } 
}



