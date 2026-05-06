<?php

namespace App\Modules\BudgetSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\BudgetSection\Admin\Tasks\BudgetUpdateTask;
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
}


