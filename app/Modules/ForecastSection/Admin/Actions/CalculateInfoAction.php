<?php

namespace App\Modules\ForecastSection\Admin\Actions;

use App\Core\Actions\BaseAction;

class CalculateInfoAction extends BaseAction
{   
    private array $total = [
        'sum_budget_h1'   => 0,
        'sum_budget_h2'   => 0,
        'sum_business_h1' => 0,
        'sum_business_h2' => 0,
        'vol_budget_h1'   => 0,
        'vol_budget_h2'   => 0,
        'vol_business_h1' => 0,
        'vol_business_h2' => 0,
        'sum_budget'      => 0,
        'vol_budget'      => 0,
        'sum_business'    => 0,
        'vol_business'    => 0,
        'sum_bud_bus_h1'  => 0,
        'sum_bud_bus_h2'  => 0,
        'vol_bud_bus_h1'  => 0,
        'vol_bud_bus_h2'  => 0,
        'sum'             => 0,
        'vol'             => 0,
    ];
    
    /**
     * Получаем итоговые суммы
     *
     * @param int $table, array $info
     * @return array
     */
    public function selectTotal(int $table, array $info): array
    {   
        if($table < 3){
            return [];  
        }
        
        foreach($info as $value){
            $this->total['sum_budget_h1'] += $value['sum_budget_h1'];
            $this->total['sum_budget_h2'] += $value['sum_budget_h2'];
            $this->total['sum_business_h1'] += $value['sum_business_h1'];
            $this->total['sum_business_h2'] += $value['sum_business_h2'];
            $this->total['vol_budget_h1'] += $value['vol_budget_h1'];
            $this->total['vol_budget_h2'] += $value['vol_budget_h2'];
            $this->total['vol_business_h1'] += $value['vol_business_h1'];
            $this->total['vol_business_h2'] += $value['vol_business_h2'];
            $this->total['sum_budget'] += $value['sum_budget'];
            $this->total['vol_budget'] += $value['vol_budget'];
            $this->total['sum_business'] += $value['sum_business'];
            $this->total['vol_business'] += $value['vol_business'];
            $this->total['sum_bud_bus_h1'] += $value['sum_bud_bus_h1'];
            $this->total['sum_bud_bus_h2'] += $value['sum_bud_bus_h2'];
            $this->total['vol_bud_bus_h1'] += $value['vol_bud_bus_h1'];
            $this->total['vol_bud_bus_h2'] += $value['vol_bud_bus_h2'];
            $this->total['sum'] += $value['sum'];
            $this->total['vol'] += $value['vol'];
        }
        return $this->total;        
    } 
}

