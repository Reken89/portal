<?php

namespace App\Modules\ForecastSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\UtilitiesSection\Admin\Models\Utilities;

class SelectInfoTask extends BaseTask
{   
    /**
     * Получаем информацию
     *
     * @param int $year
     * @return array
     */
    public function selectInfo(int $year, array $users, array $months): array
    {     
        return Utilities::select('user_id')   
            ->selectRaw('SUM(mb_volume_heat) as mb_volume_heat')   
            ->selectRaw('SUM(pd_volume_heat) as pd_volume_heat') 
            ->selectRaw('SUM(mb_volume_drainage) as mb_volume_drainage')
            ->selectRaw('SUM(pd_volume_drainage) as pd_volume_drainage')
            ->selectRaw('SUM(mb_volume_negative) as mb_volume_negative')
            ->selectRaw('SUM(pd_volume_negative) as pd_volume_negative') 
            ->selectRaw('SUM(mb_volume_water) as mb_volume_water')  
            ->selectRaw('SUM(pd_volume_water) as pd_volume_water')     
            ->selectRaw('SUM(mb_volume_power) as mb_volume_power')  
            ->selectRaw('SUM(pd_volume_power) as pd_volume_power')  
            ->selectRaw('SUM(mb_volume_trash) as mb_volume_trash')    
            ->selectRaw('SUM(pd_volume_trash) as pd_volume_trash')     
            ->where('year', $year)   
            ->whereIn('user_id', $users)
            ->whereIn('mounth', $months)
            ->get()
            ->toArray();       
    }
}
