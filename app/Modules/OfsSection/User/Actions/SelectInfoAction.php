<?php

namespace App\Modules\OfsSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\OfsSection\User\Tasks\SelectOfsTask;

class SelectInfoAction extends BaseAction
{   
    /**
     * Получаем месяц из таблицы ofs
     *
     * @param int $id
     * @return array
     */
    public function SelectMounth(int $id): array
    {   
        return $this->task(SelectOfsTask::class)->SelectMounth($id);    
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
}
