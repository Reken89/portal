<?php

namespace App\Modules\Ofs26Section\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Ofs26Section\Admin\Dto\ExportDto;
use App\Modules\Ofs26Section\Admin\Tasks\SelectOfsTask;

class SelectInfoAction extends BaseAction
{      
    /**
     * Получаем информацию из таблицы ofs
     *
     * @ExportDto $dto
     * @return array
     */
    public function selectInfo(ExportDto $dto): array
    {   
        return $this->task(SelectOfsTask::class)->selectInfo($dto);   
    } 
}
