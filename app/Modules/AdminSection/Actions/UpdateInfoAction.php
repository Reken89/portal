<?php

namespace App\Modules\AdminSection\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\AdminSection\Dto\UpdateUserInfoDto;
use App\Modules\AdminSection\Dto\UpdatePasswordDto;
use App\Modules\AdminSection\Tasks\UpdateUserTask;

class UpdateInfoAction extends BaseAction
{   
    /**
     * Обновляем информацию о пользователе
     *
     * @param UpdateUserInfoDto $dto
     * @return bool
     */
    public function UpdateInfo(UpdateUserInfoDto $dto): bool
    {   
        return $this->task(UpdateUserTask::class)->UpdateInfo($dto);    
    }   
    
    /**
     * Обновляем пароль пользователя
     *
     * @param UpdatePasswordDto $dto
     * @return bool
     */
    public function UpdatePassword(UpdatePasswordDto $dto): bool
    {   
        return $this->task(UpdateUserTask::class)->UpdatePassword($dto);    
    } 
}

