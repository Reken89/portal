<?php

namespace App\Modules\OfsSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\OfsSection\User\Tasks\SelectOfsTask;
use App\Modules\OfsSection\User\Tasks\SelectHi100ryTask;
use App\Modules\OfsSection\User\Tasks\CoordinatorTask;
use App\Modules\OfsSection\User\Tasks\FinishTask;

class SelectInfoAction extends BaseAction
{   
    /**
     * Получаем месяц из таблицы ofs
     *
     * @param int $id
     * @return array
     */
    public function SelectMounth(int $id): int
    {   
        //return $this->task(SelectOfsTask::class)->SelectMounth($id);   
        return $this->task(CoordinatorTask::class)->SelectMounth($id); 
    }   
    
    /**
     * Получаем информацию из таблицы ofs
     *
     * @param int $user, int $chapter
     * @return array
     */
    public function SelectInfo(int $user, int $chapter): array
    {   
        return $this->task(SelectOfsTask::class)->SelectInfo($user, $chapter);    
    } 
    
    /**
     * Получаем информацию из таблицы hi100ry
     *
     * @param
     * @return array
     */
    public function SelectHi100ry(): array
    {   
        return $this->task(SelectHi100ryTask::class)->SelectInfo();    
    } 
    
    /**
     * Получаем контрольную дату
     *
     * @param
     * @return
     */
    public function SelectFinish()
    {   
        $date = $this->task(FinishTask::class)->SelectInfo('ofs');
        return $date['date'];
    } 
}
