<?php

namespace App\Modules\ForecastSection\Admin\Actions;

use App\Core\Actions\BaseAction;

class SynchCommunalAction extends BaseAction
{      
    /**
     * Синхронизируем таблицы
     * Коммунальные услуги и прогноз
     *
     * @param 
     * @return bool
     */
    public function synchCommunal(): bool
    {  
        return DB::transaction(function () {
            //Таски для выполнения действий
        return true;
        });
    } 
}

