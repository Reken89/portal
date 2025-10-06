<?php

namespace App\Modules\OfsSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\OfsSection\User\Tasks\FinishTask;
use App\Modules\OfsSection\User\Tasks\CoordinatorTask;

class StructureAction extends BaseAction
{      
    /**
     * Определяем структуру ячеек
     * Открытые или закрытые
     * 
     * @return 
     */
    public function DetermineStructure(int $user_id)
    {    
        $max_date = $this->task(FinishTask::class)->SelectInfo('ofs'); 
        $date = date('d');
        $work_mounth = $this->task(CoordinatorTask::class)->SelectMounth($user_id);
        $mounth = ltrim(date('m'), '0');
        $old_mounth = $this->task(FinishTask::class)->SelectInfo('old_mounth'); 
        
        //Если разрешено редактировать старый месяц 
        //И если текущая дата меньше отчетной даты
        if($old_mounth['date'] == "yes" && $date < $max_date['date']){
            return "open";
        }
        //Если текущая дата меньше отчетной даты
        //И если месяц для редактировния предыдущий
        if($date < $max_date['date'] && $work_mounth + 1 == $mounth){
            return "open";
        }
        //В остальных случаях запрет на редактирование
        return "close";       
    }   

}

