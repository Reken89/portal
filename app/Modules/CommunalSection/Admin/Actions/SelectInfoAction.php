<?php

namespace App\Modules\CommunalSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\CommunalSection\Admin\Tasks\SelectCommunalsTask;

class SelectInfoAction extends BaseAction
{   
    /**
     * Получаем коммунальные услуги
     * по заданным параметрам
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectCommunals(array $year, array $mounth): array
    {   
        if (count($year) == '1' AND count($mounth) == '1'){
            return $this->task(SelectCommunalsTask::class)->SelectTable($year, $mounth);
        }else{
            return $this->task(SelectCommunalsTask::class)->SelectTeam($year, $mounth);
        }      
    }
    
    /**
     * Получаем итоговую строку
     * таблицы communals
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectTotal(array $year, array $mounth): array
    {   

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




