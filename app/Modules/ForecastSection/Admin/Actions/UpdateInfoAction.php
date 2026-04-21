<?php

namespace App\Modules\ForecastSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\ForecastSection\Admin\Tasks\WorkTariffTask;
use App\Modules\ForecastSection\Admin\Dto\UpdateTariffDto;

class UpdateInfoAction extends BaseAction
{      
    /**
     * Обновляем тариф
     *
     * @param UpdateTariffDto $dto
     * @return bool
     */
    public function updateTariff(UpdateTariffDto $dto): bool
    {   
        return $this->task(WorkTariffTask::class)->updateTariff($dto);          
    } 
}

