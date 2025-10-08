<?php

namespace App\Modules\RoboSection\Ofs\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\RoboSection\Ofs\Tasks\FinishTask;
use App\Modules\RoboSection\Ofs\Tasks\CoordinatorTask;
use App\Modules\RoboSection\Ofs\Tasks\OfsTask;

class SynchMounthAction extends BaseAction
{      
    /**
     * Подготавливаем таблицу ofs
     * Для заполнения нового месяца
     *
     * @param 
     * @return 
     */
    public function SynchMounth()
    {   
        $day = ltrim(date('d'), '0');
        $day_x = 1;       
        if($day_x != $day){
            return false;
        }
        //$mounth = ltrim(date('m'), '0') - 1;
        $mounth = 1;
        $this->task(OfsTask::class)->UpdateMounth();
        $this->task(CoordinatorTask::class)->UpdateMounth($mounth);
        $this->task(FinishTask::class)->UpdateInfo(1, '17');
        return true;
    }   
 
}

