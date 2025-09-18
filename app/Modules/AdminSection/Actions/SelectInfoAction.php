<?php

namespace App\Modules\AdminSection\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\AdminSection\Tasks\SelectUserTask;

class SelectInfoAction extends BaseAction
{   
    /**
     * Получаем список пользователей
     *
     * @param 
     * @return array
     */
    public function SelectUsers(): array
    {   
        return $this->task(SelectUserTask::class)->SelectUsers();    
    }   
}

