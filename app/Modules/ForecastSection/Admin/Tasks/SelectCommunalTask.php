<?php

namespace App\Modules\ForecastSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\ForecastSection\Admin\Models\ForecastCommunal;

class SelectCommunalTask extends BaseTask
{   
    /**
     * Возвращаем таблицу ForecastCommunals
     *
     * @param int $year, string $tariff
     * @return array
     */
    public function selectInfo(int $year, string $tariff): array
    {     
        return ForecastCommunal::select()   
            ->selectRaw("(`sum_budget_h1` + `sum_budget_h2`) AS sum_budget")
            ->selectRaw("(`vol_budget_h1` + `vol_budget_h2`) AS vol_budget")
            ->selectRaw("(`sum_business_h1` + `sum_business_h2`) AS sum_business")
            ->selectRaw("(`vol_business_h1` + `vol_business_h2`) AS vol_business")   
            ->selectRaw("(`sum_budget_h1` + `sum_business_h1`) AS sum_bud_bus_h1") 
            ->selectRaw("(`sum_budget_h2` + `sum_business_h2`) AS sum_bud_bus_h2")  
            ->selectRaw("(`vol_budget_h1` + `vol_business_h1`) AS vol_bud_bus_h1")    
            ->selectRaw("(`vol_budget_h2` + `vol_business_h2`) AS vol_bud_bus_h2")     
            ->selectRaw("(`sum_budget_h1` + `sum_budget_h2` + `sum_business_h1` + `sum_business_h2`) AS sum")
            ->selectRaw("(`vol_budget_h1` + `vol_budget_h2` + `vol_business_h1` + `vol_business_h2`) AS vol")    
            ->with(['user:id,name']) 
            ->where('year', $year) 
            ->where('title', $tariff)    
            ->get()
            ->toArray();       
    }
    
    /**
     * Возвращаем таблицу ForecastCommunals
     * Свод по всем тарифам
     *
     * @param int $year
     * @return array
     */
    public function selectTotalInfo(int $year): array
    {     
        return ForecastCommunal::select('user_id')
            ->selectRaw("'all' as title")    
            ->selectRaw('SUM(`sum_budget_h1`) as sum_budget_h1')
            ->selectRaw('SUM(`sum_budget_h2`) as sum_budget_h2')
            ->selectRaw('SUM(`vol_budget_h1`) as vol_budget_h1')
            ->selectRaw('SUM(`vol_budget_h2`) as vol_budget_h2')                
            ->selectRaw('SUM(`sum_business_h1`) as sum_business_h1')
            ->selectRaw('SUM(`sum_business_h2`) as sum_business_h2')
            ->selectRaw('SUM(`vol_business_h1`) as vol_business_h1')
            ->selectRaw('SUM(`vol_business_h2`) as vol_business_h2')
            ->selectRaw('SUM(`sum_budget_h1`) + SUM(`sum_budget_h2`) as sum_budget')
            ->selectRaw('SUM(`vol_budget_h1`) + SUM(`vol_budget_h2`) as vol_budget') 
            ->selectRaw('SUM(`sum_business_h1`) + SUM(`sum_business_h2`) as sum_business')   
            ->selectRaw('SUM(`vol_business_h1`) + SUM(`vol_business_h2`) as vol_business')   
            ->selectRaw('SUM(`sum_budget_h1`) + SUM(`sum_business_h1`) as sum_bud_bus_h1')   
            ->selectRaw('SUM(`sum_budget_h2`) + SUM(`sum_business_h2`) as sum_bud_bus_h2')  
            ->selectRaw('SUM(`vol_budget_h1`) + SUM(`vol_business_h1`) as vol_bud_bus_h1')    
            ->selectRaw('SUM(`vol_budget_h2`) + SUM(`vol_business_h2`) as vol_bud_bus_h2')    
            ->selectRaw('SUM(`sum_budget_h1`) + SUM(`sum_budget_h2`) + SUM(`sum_business_h1`) + SUM(`sum_business_h2`) as sum')   
            ->selectRaw('SUM(`vol_budget_h1`) + SUM(`vol_budget_h2`) + SUM(`vol_business_h1`) + SUM(`vol_business_h2`) as vol')       
            ->with(['user:id,name']) 
            ->where('year', $year) 
            ->groupBy('user_id')    
            ->get()
            ->toArray();       
    }
}