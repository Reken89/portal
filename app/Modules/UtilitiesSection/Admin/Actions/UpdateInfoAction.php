<?php

namespace App\Modules\UtilitiesSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\UtilitiesSection\Admin\Dto\UpdateTariffsDto;
use App\Modules\UtilitiesSection\Admin\Dto\SynchTariffsDto;
use App\Modules\UtilitiesSection\Admin\Tasks\UpdateTarifTask;
use App\Modules\UtilitiesSection\Admin\Tasks\SelectTarifTask;
use App\Modules\UtilitiesSection\Admin\Tasks\UpdateUtilitiesTask;

class UpdateInfoAction extends BaseAction
{    
   /**
     * Обновляем тарифы
     *
     * @param UpdateTariffsDto $dto
     * @return bool
     */
    public function UpdateTariffs(UpdateTariffsDto $dto): bool
    {   
        return $this->task(UpdateTarifTask::class)->UpdateTariffs($dto);    
    } 
    
    /**
     * Обновляем тарифы
     * Все значения (услуги)
     *
     * @param UpdateTariffsDto $dto
     * @return
     */
    public function UpdateTeam(SynchTariffsDto $dto)
    {   
        $team = $this->task(SelectTarifTask::class)->SelectTariffs($dto->year, $dto->mounth - 1);
        foreach ($team as $value) {
            $this->task(UpdateTarifTask::class)->UpdateTeam($dto->year, $dto->mounth, $value);
        }           
    } 
    
    /**
     * Обновляем статус
     *
     * @param int $id, int $status
     * @return bool
     */
    public function UpdateStatus(int $id, int $status): bool
    {   
        return $this->task(UpdateUtilitiesTask::class)->UpdateStatus($id, $status);    
    } 
             
}
