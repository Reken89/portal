<?php

namespace App\Modules\ForecastSection\Admin\Actions;

use App\Core\Actions\BaseAction;
use Illuminate\Support\Facades\DB;
use App\Modules\ForecastSection\Admin\Tasks\SelectInfoTask;
use App\Modules\ForecastSection\Admin\Tasks\CalculateInfoTask;

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
            $users = [3, 4, 5, 7, 8, 9, 10, 13, 15, 16, 17, 18, 19, 20, 21, 23,];
            
            //Получаем суммарный объем за первое полугодие
            $volume_h1_total = $this->task(SelectInfoTask::class)->selectVolH1(2026, $users, [1, 2, 3, 4, 5, 6]); 
            
            //Обновляем таблицу прогноза. Объем первого полугодия
            foreach ($volume_h1_total as $volume) {
                $this->task(CalculateInfoTask::class)->updateVolH1($volume, 2026);
            }
            
            //Получаем суммарный объем за первое полугодие, умноженный на тарифы
            $sum_h1_total = $this->task(SelectInfoTask::class)->selectSumH1(2026, $users, [1, 2, 3, 4, 5, 6]); 
            
            //Обновляем таблицу прогноза. Сумма первого полугодия
            foreach ($sum_h1_total as $sum) {
                $this->task(CalculateInfoTask::class)->updateSumH1($sum, 2026);
            }
            return true;
        });
    } 
}

