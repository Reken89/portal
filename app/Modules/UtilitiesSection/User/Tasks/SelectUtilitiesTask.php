<?php

namespace App\Modules\UtilitiesSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\UtilitiesSection\Admin\Models\Utilities;

class SelectUtilitiesTask extends BaseTask
{   
    /**
     * Возвращаем таблицу utilities
     *
     * @param int $year, int $mounth, int $id
     * @return array
     */
    public function SelectTable(int $year, int $mounth, int $id): array
    {     
        return Utilities::select()
            ->selectRaw("(`mb_volume_heat` + `pd_volume_heat`) AS volume_heat")
            ->selectRaw("(`mb_sum_heat` + `pd_sum_heat`) AS sum_heat")     
            ->selectRaw("(`mb_volume_drainage` + `pd_volume_drainage`) AS volume_drainage")
            ->selectRaw("(`mb_sum_drainage` + `pd_sum_drainage`) AS sum_drainage") 
            ->selectRaw("(`mb_volume_negative` + `pd_volume_negative`) AS volume_negative")
            ->selectRaw("(`mb_sum_negative` + `pd_sum_negative`) AS sum_negative")    
            ->selectRaw("(`mb_volume_water` + `pd_volume_water`) AS volume_water")
            ->selectRaw("(`mb_sum_water` + `pd_sum_water`) AS sum_water") 
            ->selectRaw("(`mb_volume_power` + `pd_volume_power`) AS volume_power")
            ->selectRaw("(`mb_sum_power` + `pd_sum_power`) AS sum_power")    
            ->selectRaw("(`mb_volume_trash` + `pd_volume_trash`) AS volume_trash")
            ->selectRaw("(`mb_sum_trash` + `pd_sum_trash`) AS sum_trash")     
            ->where('year', $year)
            ->where('mounth', $mounth) 
            ->where('user_id', $id)     
            ->first()
            ->toArray();       
    }

}










