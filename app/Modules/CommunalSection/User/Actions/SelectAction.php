<?php

namespace App\Modules\CommunalSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\CommunalSection\User\Tasks\SelectCommunalTask;

class SelectAction extends BaseAction
{   
    /**
     * Получаем коммунальные услуги
     * по заданным параметрам
     *
     * @param array $year, int $id
     * @return array
     */
    public function SelectCommunals(array $year, int $id): array
    {   
        if (count($year) == '1'){
            return $this->task(SelectCommunalTask::class)->SelectTable($year, $id); 
        }else{
            return $this->task(SelectCommunalTask::class)->SelectTeam($year, $id); 
        } 
    }      
    
    /**
     * Получаем итоговую строку
     * таблица communals
     *
     * @param array $year, int $id
     * @return array
     */
    public function SelectTotal(array $year, int $id): array
    {   
        return $this->task(SelectCommunalTask::class)->SelectTotal($year, $id); 
    } 
}

