<?php

namespace App\Modules\ForecastSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\ForecastSection\Admin\Tasks\WorkTariffTask;
use App\Modules\ForecastSection\Admin\Tasks\SelectCommunalTask;

class SelectInfoAction extends BaseAction
{      
    /**
     * Получаем информацию из БД
     *
     * @param int $table
     * @return array
     */
    public function selectInfo(int $table): array
    {   
        if($table == 1){
            return $this->task(WorkTariffTask::class)->selectTariffs(2026);  
        }
        
        if($table == 2){
            return [];  
        }
        
        if($table > 2){
            return $this->task(SelectCommunalTask::class)->selectInfo(2026);  
        }
    } 
}

