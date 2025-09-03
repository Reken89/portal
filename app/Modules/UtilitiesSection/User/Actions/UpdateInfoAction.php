<?php

namespace App\Modules\UtilitiesSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\UtilitiesSection\User\Dto\UpdateUtilitiesDto;
use App\Modules\UtilitiesSection\User\Dto\UpdateStatusDto;
use App\Modules\UtilitiesSection\User\Tasks\UpdateUtilitiesTask;
use App\Modules\UtilitiesSection\User\Tasks\ExaminUtilitiesTask;
use App\Modules\UtilitiesSection\User\Tasks\SelectUtilitiesTask;
use App\Modules\UtilitiesSection\User\Tasks\SelectTarifTask;
use App\Modules\UtilitiesSection\User\Tasks\PointsTask;

class UpdateInfoAction extends BaseAction
{   
    /**
     * Обновляем значения в таблице utilities
     *
     * @param UpdateUtilitiesDto $dto
     * @return 
     */
    public function UpdateUtilities(UpdateUtilitiesDto $dto)
    {   
        $this->task(UpdateUtilitiesTask::class)->UpdateUtilities($dto);  
        if($dto->type == "drainage"){
            $this->task(UpdateUtilitiesTask::class)->UpdateNegative($dto);
        }
    }    
    
    /**
     * Выполняем роверку значений
     * таблица utilities
     *
     * @param UpdateStatusDto $dto, array $name
     * @return 
     */
    public function ExaminUtilities(UpdateStatusDto $dto, array $type)
    {   
        $utilities = $this->task(SelectUtilitiesTask::class)->SelectForExamin($dto->id);
        $tariffs = $this->task(SelectTarifTask::class)->SelectTariffs($utilities['year'], $utilities['mounth']);
        for($i = 0; $i < 6; $i++){
            $volume = "volume_$type[$i]";
            $sum = "sum_$type[$i]";
            $result = $this->task(ExaminUtilitiesTask::class)->ExaminUtilities($utilities[$volume], $utilities[$sum], $tariffs[$i]['tarif_min'], $tariffs[$i]['tarif_max']);
            if($result == false){
                return false;
            }           
        }
        return true;           
    }
    
    /**
     * Обновляем статус в таблице
     * таблица utilities
     *
     * @param UpdateUtilitiesDto $dto
     * @return 
     */
    public function UpdateStatus(int $id, int $status)
    {   
        $this->task(UpdateUtilitiesTask::class)->UpdateStatus($id, $status);    
    } 
    
    /**
     * Обновляем очки учреждения
     *
     * @param int $id
     * @return bool
     */
    public function UpdatePoints(int $id): bool
    {   
        $points = $this->task(PointsTask::class)->SelectPoints($id);
        if(date("d") < 18 && date("m") !== $points["mounth"] && date("m") > $points["mounth"]){
            return $this->task(PointsTask::class)->UpdatePoints($id);
        }else{
            return false;
        }   
    } 
}

