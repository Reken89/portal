<?php

namespace App\Modules\Ofs26Section\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Ofs26Section\User\Tasks\SelectOfsTask;

class SelectInfoAction extends BaseAction
{      
    /**
     * Получаем информацию из таблицы ofs
     *
     * @param int $user, int $mounth, int $chapter
     * @return array
     */
    public function SelectInfo(int $user, int $mounth, int $chapter): array
    {   
        return $this->task(SelectOfsTask::class)->SelectInfo($user, $mounth, $chapter);    
    } 
}

