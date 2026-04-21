<?php

namespace App\Modules\ForecastSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\ForecastSection\Admin\Tasks\WorkTariffTask;

class SelectInfoAction extends BaseAction
{      
    /**
     * Получаем информацию из БД
     *
     * @ExportDto int $table
     * @return array
     */
    public function selectInfo(int $table): array
    {   
        if($table == 1){
            return $this->task(WorkTariffTask::class)->selectTariffs(2026);  
        }
    } 
}

