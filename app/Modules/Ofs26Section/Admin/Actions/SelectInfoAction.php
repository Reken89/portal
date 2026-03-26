<?php

namespace App\Modules\Ofs26Section\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Ofs26Section\Admin\Dto\ExportDto;
use App\Modules\Ofs26Section\Admin\Tasks\SelectOfsTask;
use App\Modules\Ofs26Section\Admin\Tasks\CounterTask;

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
    
    /**
     * Получаем информацию из таблицы ofs
     *
     * @ExportDto $dto
     * @return array
     */
    public function selectCounter(int $id): array
    {   
        return $this->task(CounterTask::class)->selectInfo($id);   
    } 
    
    /**
     * Получаем информацию из таблицы ofs
     *
     * @return array
     */
    public function selectMatrix(): array
    {   
        return $this->task(SelectOfsTask::class)->selectMatrix(); 
    } 
}
