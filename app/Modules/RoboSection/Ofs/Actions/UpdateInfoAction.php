<?php

namespace App\Modules\RoboSection\Ofs\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\RoboSection\Ofs\Tasks\FinishTask;
use App\Modules\RoboSection\Ofs\Tasks\CoordinatorTask;

class UpdateInfoAction extends BaseAction
{   
    /**
     * Обновляем значения в ofs
     *
     * @param 
     * @return 
     */
    public function UpdateInfo()
    {   
        $finish = $this->task(FinishTask::class)->SelectInfo('old_mounth'); 
        if($finish['date'] == "yes"){
            $this->task(FinishTask::class)->UpdateInfo();
            $mounth = ltrim(date('m'), '0') - 1;
            $this->task(CoordinatorTask::class)->UpdateMounth($mounth);
            return true;
        }else{
            return false;
        }
    }   
 
}

