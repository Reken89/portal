<?php

namespace App\Modules\OfsSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\OfsSection\Admin\Tasks\FinishTask;
use App\Modules\OfsSection\Admin\Tasks\CounterTask;
use App\Modules\OfsSection\Admin\Tasks\OfsTask;
use App\Modules\OfsSection\Admin\Dto\ExportDto;

class SelectInfoAction extends BaseAction
{   
    /**
     * Получаем информацию из таблицы finish
     *
     * @param int $id
     * @return 
     */
    public function SelectRules(int $id)
    {   
        $rules = $this->task(FinishTask::class)->SelectInfo($id);  
        return $rules['date'];
    }   
    
    /**
     * Получаем информацию из таблицы counters
     * Счетчик
     *
     * @param 
     * @return array
     */
    public function SelectCounter()
    {   
        return $this->task(CounterTask::class)->SelectInfo(1);  
    }   
    
    /**
     * Получаем информацию из ofs
     *
     * @param 
     * @return array
     */
    public function SelectOfs(ExportDto $dto)
    {   
        return $this->task(OfsTask::class)->SelectInfo($dto);  
    } 
    
    /**
     * Проверяем таблицу на наличие ошибок
     *
     * @param 
     * @return bool
     */
    public function SelectErrors(ExportDto $dto)
    {   
        return $this->task(OfsTask::class)->CheckingError($dto);  
    } 
}

