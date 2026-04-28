<?php

namespace App\Modules\ForecastSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\ForecastSection\Admin\Tasks\WorkTariffTask;
use App\Modules\ForecastSection\Admin\Tasks\SelectCommunalTask;
use App\Modules\ForecastSection\Admin\Tasks\SelectInfoTask;

class SelectInfoAction extends BaseAction
{      
    /**
     * Получаем информацию из БД
     *
     * @param int $table, string $tariff
     * @return array
     */
    public function selectInfo(int $table, string $tariff): array
    {   
        if($table == 1){
            return $this->task(WorkTariffTask::class)->selectTariffs(2026);  
        }
        
        if($table == 2){
            return $this->task(SelectInfoTask::class)->selectStatus(2026, [3, 4, 5, 7, 8, 9, 10, 13, 15, 16, 17, 18, 19, 20, 21, 23,]);  
        }
        
        if($table > 2){
            if($tariff == 'all'){
                return $this->task(SelectCommunalTask::class)->selectTotalInfo(2026); 
            }
            return $this->task(SelectCommunalTask::class)->selectInfo(2026, $tariff);  
        }
    } 
}

