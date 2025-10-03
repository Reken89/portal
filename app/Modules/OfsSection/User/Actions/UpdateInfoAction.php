<?php

namespace App\Modules\OfsSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\OfsSection\User\Dto\UpdateOfsDto;
use App\Modules\OfsSection\User\Dto\SynchOfsDto;
use App\Modules\OfsSection\User\Tasks\UpdateOfsTask;
use App\Modules\OfsSection\User\Tasks\SelectOfsTask;
use App\Modules\OfsSection\User\Tasks\AddHi100ryTask;

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
    
    /**
     * Синхронизируем OFS
     *
     * @param UpdateOfsDto $dto
     * @return 
     */
    public function SynchOfs(SynchOfsDto $dto)
    {   
        $ofs = $this->task(SelectOfsTask::class)->SelectSynch($dto); 
        if(!empty($ofs)){
            $this->task(UpdateOfsTask::class)->UpdateSynch($ofs);  
        }
        $archive = $this->task(SelectOfsTask::class)->SelectArchive($dto);
        $this->task(UpdateOfsTask::class)->UpdateOfs($archive); 
        $this->task(AddHi100ryTask::class)->AddHi100ry($dto); 
    } 
}


