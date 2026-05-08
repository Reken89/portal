<?php

namespace App\Modules\BudgetSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\ForecastSection\Admin\Models\ForecastCommunal;

class ForecastSelectTask extends BaseTask
{
    /**
     * Возвращает прогноз по заданным параметрам
     * Таблица forecast_communals
     *
     * @param int $user, int $year
     * @return array
     */
    public function selectCommunal(int $user, int $year): array
    {              
        return ForecastCommunal::selectRaw('(`sum_budget_h1` + `sum_budget_h2`) as sum_fu')
            ->where('user_id', $user)
            ->where('year', $year)      
            ->get()
            ->toArray();
    }

}