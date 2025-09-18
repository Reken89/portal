<?php

namespace App\Modules\AdminSection\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\AdminSection\Dto\AddUserDto;
use App\Modules\AdminSection\Tasks\AddUserTask;

class AddInfoAction extends BaseAction
{   
    /**
     * Добавляем нового пользователя
     *
     * @param AddUserDto $dto
     * @return bool
     */
    public function AddUser(AddUserDto $dto): bool
    {   
        return $this->task(AddUserTask::class)->AddUser($dto);    
    }   
}
