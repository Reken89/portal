<?php

namespace App\Modules\RoboSection\Ofs\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\RoboSection\Ofs\Tasks\FinishTask;
use App\Modules\RoboSection\Ofs\Tasks\CoordinatorTask;
use App\Modules\RoboSection\Ofs\Tasks\OfsTask;
use App\Modules\RoboSection\Ofs\Tasks\ArchiveTask;

class SynchOfsAction extends BaseAction
{   
    private array $users = [3, 4, 5, 7, 8, 9, 10, 13, 15, 16, 17, 18, 19, 21, 21, 23, 25, 26, 27, 28, 29];
    
    /**
     * Синхронизация таблиц
     *
     * @param 
     * @return 
     */
    public function SynchOfs()
    {   
        //$day = ltrim(date('d'), '0') - 1;
        $day = 17;
        $day_x = $this->task(FinishTask::class)->SelectInfo('ofs');       
        if($day_x['date'] != $day){
            return false;
        }
        
        $mounth_min = $this->task(CoordinatorTask::class)->MinMounth();
        //$mounth = ltrim(date('m'), '0') - 1;
        $mounth = 1;
        if($mounth_min == $mounth){
            foreach ($this->users as $user_id) {
                $ofs = $this->task(OfsTask::class)->SelectInfo($user_id);
                $this->task(ArchiveTask::class)->UpdateInfo($ofs, $mounth);
            }
            return true;
        }else{
            return false;
        }
    }   
 
}