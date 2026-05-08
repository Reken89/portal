<?php

namespace App\Modules\BudgetSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\BudgetSection\Admin\Tasks\BudgetUpdateTask;
use App\Modules\BudgetSection\Admin\Tasks\ForecastSelectTask;
use App\Modules\BudgetSection\Admin\Dto\BudgetUpdateDto;

class UpdateInfoAction extends BaseAction
{      
    /**
     * Обновляем информацию в budget26
     *
     * @param BudgetUpdateDto $dto
     * @return bool
     */
    public function updateInfo(BudgetUpdateDto $dto): bool
    {   
        return $this->task(BudgetUpdateTask::class)->updateInfo($dto); 
    } 
    
    /**
     * Синхронизируем года
     * 2029 и 2028 приравниваем к 2027
     *
     * @return bool
     */
    public function synchInfo(): bool
    {   
        return $this->task(BudgetUpdateTask::class)->synchInfo(); 
    } 
    
    /**
     * Синхронизируем таблицы
     * forecast_communals и budget26
     *
     * @return bool
     */
    public function synchCommunal(): bool
    {   
        $users = [8, 9, 10, 13, 15, 16, 18, 19, 23];
        $ekr = [26, 28, 29, 27, 30, 31];
        
        foreach ($users as $user) {
            $communals = $this->task(ForecastSelectTask::class)->selectCommunal($user, 2026);
            $sum = 0;
            for($i = 0; $i < 6; $i++){
                $this->task(BudgetUpdateTask::class)->updateCommunals($ekr[$i], $user, $communals[$i]['sum_fu']);
                $sum += $communals[$i]['sum_fu'];
            } 
            $result = $this->task(BudgetUpdateTask::class)->updateCommunals(25, $user, $sum);
        }
        
        return $result;
    } 
}


