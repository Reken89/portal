<?php

namespace App\Modules\ArchiveSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\ArchiveSection\User\Dto\AddParametersDto;
use App\Modules\ArchiveSection\User\Tasks\AddParametersTask;

class AddParametersAction extends BaseAction
{    
   /**
     * Добавляем параметры
     * Для запроса
     *
     * @param AddParametersDto $dto
     * @return bool
     */
    public function AddParameters(AddParametersDto $dto): bool
    {   
        return $this->task(AddParametersTask::class)->AddParameters($dto);    
    }             
}

