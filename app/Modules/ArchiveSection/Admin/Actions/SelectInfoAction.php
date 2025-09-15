<?php

namespace App\Modules\ArchiveSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\ArchiveSection\Admin\Tasks\SelectOfsTask;
use App\Modules\ArchiveSection\Admin\Dto\ExportDto;

class SelectInfoAction extends BaseAction
{           
    /**
     * Получаем значения ОФС
     *
     * @param ExportDto $dto
     * @return array
     */
    public function SelectOfs(ExportDto $dto): array
    {   
        return $this->task(SelectOfsTask::class)->SelectAll($dto); 
    }  
}

