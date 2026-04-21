<?php

namespace App\Modules\ForecastSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\ForecastSection\Admin\Models\Tariff;
use App\Modules\ForecastSection\Admin\Dto\UpdateTariffDto;

class WorkTariffTask extends BaseTask
{   
    /**
     * Возвращаем таблицу tariffs
     *
     * @param int $year
     * @return array
     */
    public function selectTariffs(int $year): array
    {     
        return Tariff::select()   
            ->where('year', $year)   
            ->get()
            ->groupBy('month')
            ->toArray();       
    }
    
    /**
     * Обновляем тариф
     *
     * @param UpdateTariffDto $dto
     * @return bool
     */
    public function updateTariff(UpdateTariffDto $dto): bool
    {
        $result = Tariff::find($dto->id)
        ->update([                  
            'tariff' => $dto->tariff,
            'date'   => date('Y-m-d'),
        ]);
        return $result == true ? true : false;       
    }
}

