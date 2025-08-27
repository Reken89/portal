<?php

namespace App\Modules\UtilitiesSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\UtilitiesSection\Admin\Tasks\SelectUtilitiesTask;

class SelectInfoAction extends BaseAction
{   
    /**
     * Получаем коммунальные услуги
     * по заданным параметрам
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectUtilities(array $year, array $mounth): array
    {   
        if (count($year) == '1' AND count($mounth) == '1'){
            return $this->task(SelectUtilitiesTask::class)->SelectTable($year, $mounth);
        }else{
            return $this->task(SelectUtilitiesTask::class)->SelectTeam($year, $mounth);
        }      
    }
    
    /**
     * Получаем итоговую строчку
     *
     * @param array $year, array $mounth
     * @return string
     */
    public function SelectTotal(array $year, array $mounth): array
    {   
        return $this->task(SelectUtilitiesTask::class)->SelectTotal($year, $mounth);    
    }
        
    /**
     * Определяем, сколько параметров в запросе
     * Один или много
     *
     * @param array $year, array $mounth
     * @return string
     */
    public function DefineVariant(array $year, array $mounth): string
    {   
        if (count($year) == '1' AND count($mounth) == '1'){
            return "one";
        }else{
            return "many";
        }      
    }
             
}

