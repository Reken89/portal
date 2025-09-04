<?php

namespace App\Modules\UtilitiesSection\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\UtilitiesSection\User\Tasks\SelectUtilitiesTask;
use App\Modules\UtilitiesSection\User\Tasks\SelectTarifTask;

class SelectInfoAction extends BaseAction
{   
    /**
     * Получаем коммунальные услуги
     * по заданным параметрам
     *
     * @param array $year, array $mounth, int $id
     * @return array
     */
    public function SelectUtilities(array $year, array $mounth, int $id): array
    {   
        return $this->task(SelectUtilitiesTask::class)->SelectTable($year[0], $mounth[0], $id);    
    }   
    
    /**
     * Получаем тарифы
     * по заданным параметрам
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectTariffs(array $year, array $mounth): array
    {   
        return $this->task(SelectTarifTask::class)->SelectTariffs($year[0], $mounth[0]);    
    }  
    
    /**
     * Получаем коммунальные услуги
     * по заданным параметрам
     * Для экспорта в EXCEL
     *
     * @param int $id, int $year
     * @return array
     */
    public function SelectForExcel(int $id, int $year): array
    {   
        return $this->task(SelectUtilitiesTask::class)->SelectForExcel($id, $year);    
    }  
    
    /**
     * Получаем итоговую строку
     * по заданным параметрам
     * Для экспорта в EXCEL
     *
     * @param int $id, int $year
     * @return array
     */
    public function SelectTotal(int $id, int $year): array
    {   
        return $this->task(SelectUtilitiesTask::class)->SelectTotal($id, $year);    
    }  
}

