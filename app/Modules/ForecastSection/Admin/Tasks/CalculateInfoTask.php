<?php

namespace App\Modules\ForecastSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;

class CalculateInfoTask extends BaseTask
{   
    /**
     * Суммируем информацию
     *
     * @param
     * @return array
     */
    public function calculateInfoH1(Collection $info): array
    {     
        return $info->groupBy('user_id')->map(function ($items, $userId) {
            return [
                'user_id' => $userId,
                'mb_sum_heat' => $items->sum('mb_sum_heat'),
                'pd_sum_heat' => $items->sum('pd_sum_heat'),
                'mb_sum_drainage' => $items->sum('mb_sum_drainage'),
            ];
        })->values()->toArray();    
    }
}