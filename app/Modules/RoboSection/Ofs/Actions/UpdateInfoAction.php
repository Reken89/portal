<?php

namespace App\Modules\RoboSection\Ofs\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\RoboSection\Ofs\Tasks\FinishTask;
use App\Modules\RoboSection\Ofs\Tasks\CoordinatorTask;
use App\Modules\RoboSection\Ofs\Tasks\OfsTask;
use App\Modules\RoboSection\Ofs\Tasks\ArchiveTask;

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
            $this->task(FinishTask::class)->UpdateInfo(2, 'no');
            //$mounth = ltrim(date('m'), '0') - 1;
            $mounth = 1;
            $mounth_array = $this->task(CoordinatorTask::class)->SelectMounth($mounth);
            foreach ($mounth_array as $value) {
                $ofs = $this->task(OfsTask::class)->SelectInfo($value['user_id']); 
                if(!empty($ofs)){
                    $this->task(ArchiveTask::class)->UpdateInfo($ofs, $value['mounth']);  
                }
                $archive = $this->task(ArchiveTask::class)->SelectInfo($value['user_id'], $mounth);
                if(!empty($archive)){
                    $this->task(OfsTask::class)->UpdateInfo($archive); 
                }else{
                    $this->task(OfsTask::class)->AdjustOfs($value['user_id']); 
                } 
            }
            $this->task(CoordinatorTask::class)->UpdateMounth($mounth);
            return true;
        }else{
            return false;
        }
    }   
 
}

