<?php

namespace App\Modules\UtilitiesSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\UtilitiesSection\Admin\Models\Utilities;

class SelectUtilitiesTask extends BaseTask
{   
    /**
     * Возвращаем таблицу utilities
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectTable(array $year, array $mounth): array
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
            ->selectRaw('(`mb_sum_heat` + `pd_sum_heat` '
                . '+ `mb_sum_drainage` + `pd_sum_drainage` '
                . '+ `mb_sum_negative` + `pd_sum_negative` '
                . '+ `mb_sum_water` + `pd_sum_water` '
                . '+ `mb_sum_power` + `pd_sum_power` '    
                . '+ `mb_sum_trash` + `pd_sum_trash`) '
                . 'as total')    
            ->with(['user:id,name'])    
            ->whereIn('year', $year)
            ->whereIn('mounth', $mounth) 
            ->get()
            ->toArray();       
    }
    
    /**
     * Возвращаем таблицу utilities
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectTeam(array $year, array $mounth): array
    {     
        return Utilities::select('user_id')
            ->selectRaw('SUM(`mb_volume_heat`) as mbvolume_heat')
            ->selectRaw('SUM(`pd_volume_heat`) as pdvolume_heat')
            ->selectRaw('SUM(`mb_sum_heat`) as mbsum_heat')  
            ->selectRaw('SUM(`pd_sum_heat`) as pdsum_heat')   
            ->selectRaw('SUM(`mb_volume_heat`) + SUM(`pd_volume_heat`) as volume_heat')
            ->selectRaw('SUM(`mb_sum_heat`) + SUM(`pd_sum_heat`) as sum_heat')
            ->selectRaw('SUM(`mb_volume_drainage`) as mbvolume_drainage')
            ->selectRaw('SUM(`pd_volume_drainage`) as pdvolume_drainage')
            ->selectRaw('SUM(`mb_sum_drainage`) as mbsum_drainage')  
            ->selectRaw('SUM(`pd_sum_drainage`) as pdsum_drainage')   
            ->selectRaw('SUM(`mb_volume_drainage`) + SUM(`pd_volume_drainage`) as volume_drainage')
            ->selectRaw('SUM(`mb_sum_drainage`) + SUM(`pd_sum_drainage`) as sum_drainage')
            ->selectRaw('SUM(`mb_volume_negative`) as mbvolume_negative')
            ->selectRaw('SUM(`pd_volume_negative`) as pdvolume_negative')
            ->selectRaw('SUM(`mb_sum_negative`) as mbsum_negative')  
            ->selectRaw('SUM(`pd_sum_negative`) as pdsum_negative')   
            ->selectRaw('SUM(`mb_volume_negative`) + SUM(`pd_volume_negative`) as volume_negative')
            ->selectRaw('SUM(`mb_sum_negative`) + SUM(`pd_sum_negative`) as sum_negative')
            ->selectRaw('SUM(`mb_volume_water`) as mbvolume_water')
            ->selectRaw('SUM(`pd_volume_water`) as pdvolume_water')
            ->selectRaw('SUM(`mb_sum_water`) as mbsum_water')  
            ->selectRaw('SUM(`pd_sum_water`) as pdsum_water')   
            ->selectRaw('SUM(`mb_volume_water`) + SUM(`pd_volume_water`) as volume_water')
            ->selectRaw('SUM(`mb_sum_water`) + SUM(`pd_sum_water`) as sum_water')
            ->selectRaw('SUM(`mb_volume_power`) as mbvolume_power')
            ->selectRaw('SUM(`pd_volume_power`) as pdvolume_power')
            ->selectRaw('SUM(`mb_sum_power`) as mbsum_power')  
            ->selectRaw('SUM(`pd_sum_power`) as pdsum_power')   
            ->selectRaw('SUM(`mb_volume_power`) + SUM(`pd_volume_power`) as volume_power')
            ->selectRaw('SUM(`mb_sum_power`) + SUM(`pd_sum_power`) as sum_power')
            ->selectRaw('SUM(`mb_volume_trash`) as mbvolume_trash')
            ->selectRaw('SUM(`pd_volume_trash`) as pdvolume_trash')
            ->selectRaw('SUM(`mb_sum_trash`) as mbsum_trash')  
            ->selectRaw('SUM(`pd_sum_trash`) as pdsum_trash')   
            ->selectRaw('SUM(`mb_volume_trash`) + SUM(`pd_volume_trash`) as volume_trash')
            ->selectRaw('SUM(`mb_sum_trash`) + SUM(`pd_sum_trash`) as sum_trash')
            ->selectRaw('SUM(`mb_sum_heat`) + SUM(`pd_sum_heat`) '
                . '+ SUM(`mb_sum_drainage`) + SUM(`pd_sum_drainage`) '
                . '+ SUM(`mb_sum_negative`) + SUM(`pd_sum_negative`) '
                . '+ SUM(`mb_sum_water`) + SUM(`pd_sum_water`) '
                . '+ SUM(`mb_sum_power`) + SUM(`pd_sum_power`) '    
                . '+ SUM(`mb_sum_trash`) + SUM(`pd_sum_trash`) '
                . 'as total') 
            ->with(['user:id,name'])    
            ->whereIn('year', $year)
            ->whereIn('mounth', $mounth) 
            ->groupBy('user_id')
            ->get()
            ->toArray();            
    }
    
    /**
     * Возвращаем таблицу utilities
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectTotal(array $year, array $mounth): array
    {     
        return Utilities::selectRaw('SUM(`mb_volume_heat`) as mbvolume_heat')
            ->selectRaw('SUM(`pd_volume_heat`) as pdvolume_heat')
            ->selectRaw('SUM(`mb_sum_heat`) as mbsum_heat')  
            ->selectRaw('SUM(`pd_sum_heat`) as pdsum_heat')   
            ->selectRaw('SUM(`mb_volume_heat`) + SUM(`pd_volume_heat`) as volume_heat')
            ->selectRaw('SUM(`mb_sum_heat`) + SUM(`pd_sum_heat`) as sum_heat')
            ->selectRaw('SUM(`mb_volume_drainage`) as mbvolume_drainage')
            ->selectRaw('SUM(`pd_volume_drainage`) as pdvolume_drainage')
            ->selectRaw('SUM(`mb_sum_drainage`) as mbsum_drainage')  
            ->selectRaw('SUM(`pd_sum_drainage`) as pdsum_drainage')   
            ->selectRaw('SUM(`mb_volume_drainage`) + SUM(`pd_volume_drainage`) as volume_drainage')
            ->selectRaw('SUM(`mb_sum_drainage`) + SUM(`pd_sum_drainage`) as sum_drainage')
            ->selectRaw('SUM(`mb_volume_negative`) as mbvolume_negative')
            ->selectRaw('SUM(`pd_volume_negative`) as pdvolume_negative')
            ->selectRaw('SUM(`mb_sum_negative`) as mbsum_negative')  
            ->selectRaw('SUM(`pd_sum_negative`) as pdsum_negative')   
            ->selectRaw('SUM(`mb_volume_negative`) + SUM(`pd_volume_negative`) as volume_negative')
            ->selectRaw('SUM(`mb_sum_negative`) + SUM(`pd_sum_negative`) as sum_negative')
            ->selectRaw('SUM(`mb_volume_water`) as mbvolume_water')
            ->selectRaw('SUM(`pd_volume_water`) as pdvolume_water')
            ->selectRaw('SUM(`mb_sum_water`) as mbsum_water')  
            ->selectRaw('SUM(`pd_sum_water`) as pdsum_water')   
            ->selectRaw('SUM(`mb_volume_water`) + SUM(`pd_volume_water`) as volume_water')
            ->selectRaw('SUM(`mb_sum_water`) + SUM(`pd_sum_water`) as sum_water')
            ->selectRaw('SUM(`mb_volume_power`) as mbvolume_power')
            ->selectRaw('SUM(`pd_volume_power`) as pdvolume_power')
            ->selectRaw('SUM(`mb_sum_power`) as mbsum_power')  
            ->selectRaw('SUM(`pd_sum_power`) as pdsum_power')   
            ->selectRaw('SUM(`mb_volume_power`) + SUM(`pd_volume_power`) as volume_power')
            ->selectRaw('SUM(`mb_sum_power`) + SUM(`pd_sum_power`) as sum_power')
            ->selectRaw('SUM(`mb_volume_trash`) as mbvolume_trash')
            ->selectRaw('SUM(`pd_volume_trash`) as pdvolume_trash')
            ->selectRaw('SUM(`mb_sum_trash`) as mbsum_trash')  
            ->selectRaw('SUM(`pd_sum_trash`) as pdsum_trash')   
            ->selectRaw('SUM(`mb_volume_trash`) + SUM(`pd_volume_trash`) as volume_trash')
            ->selectRaw('SUM(`mb_sum_trash`) + SUM(`pd_sum_trash`) as sum_trash')
            ->selectRaw('SUM(`mb_sum_heat`) + SUM(`pd_sum_heat`) '
                . '+ SUM(`mb_sum_drainage`) + SUM(`pd_sum_drainage`) '
                . '+ SUM(`mb_sum_negative`) + SUM(`pd_sum_negative`) '
                . '+ SUM(`mb_sum_water`) + SUM(`pd_sum_water`) '
                . '+ SUM(`mb_sum_power`) + SUM(`pd_sum_power`) '    
                . '+ SUM(`mb_sum_trash`) + SUM(`pd_sum_trash`) '
                . 'as total')    
            ->whereIn('year', $year)
            ->whereIn('mounth', $mounth) 
            ->first()
            ->toArray();            
    }
}









