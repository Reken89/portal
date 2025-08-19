<?php

namespace App\Modules\CommunalSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\CommunalSection\Admin\Models\Communal;

class SelectCommunalsTask extends BaseTask
{   
    /**
     * Возвращаем информацию для таблицы communals
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectTable(array $year, array $mounth): array
    {     
        return Communal::select()
            ->selectRaw("(`heat-sum` + `drainage-sum` + `negative-sum` +"
                    . "`water-sum` + `power-sum` + `trash-sum`) AS total")    
            ->with(['user:id,name'])    
            ->whereIn('year', $year)
            ->whereIn('mounth', $mounth) 
            ->get()
            ->toArray();       
    }
    
    /**
     * Возвращаем сводную таблицу communals
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectTeam(array $year, array $mounth): array
    {     
        return Communal::select('user_id')
            ->selectRaw('SUM(`heat-volume`) as heat_volume')
            ->selectRaw('SUM(`heat-sum`) as heat_sum')
            ->selectRaw('SUM(`drainage-volume`) as drainage_volume')
            ->selectRaw('SUM(`drainage-sum`) as drainage_sum') 
            ->selectRaw('SUM(`negative-volume`) as negative_volume') 
            ->selectRaw('SUM(`negative-sum`) as negative_sum')
            ->selectRaw('SUM(`water-volume`) as water_volume')
            ->selectRaw('SUM(`water-sum`) as water_sum')
            ->selectRaw('SUM(`power-volume`) as power_volume') 
            ->selectRaw('SUM(`power-sum`) as power_sum')
            ->selectRaw('SUM(`trash-volume`) as trash_volume')
            ->selectRaw('SUM(`trash-sum`) as trash_sum')
            ->selectRaw('SUM(`heat-sum`) + SUM(`drainage-sum`) + SUM(`negative-sum`) '
                    . '+ SUM(`water-sum`) + SUM(`power-sum`) + SUM(`trash-sum`) '
                    . 'as total')
            ->with(['user:id,name'])    
            ->whereIn('year', $year)
            ->whereIn('mounth', $mounth) 
            ->groupBy('user_id')
            ->get()
            ->toArray();            
    }
    
    /**
     * Возвращаем итоговую строку
     * таблицы communals
     *
     * @param array $year, array $mounth
     * @return array
     */
    public function SelectTotal(array $year, array $mounth): array
    {     
        return Communal::selectRaw('SUM(`heat-volume`) as heat_volume')
            ->selectRaw('SUM(`heat-sum`) as heat_sum')
            ->selectRaw('SUM(`drainage-volume`) as drainage_volume')
            ->selectRaw('SUM(`drainage-sum`) as drainage_sum') 
            ->selectRaw('SUM(`negative-volume`) as negative_volume') 
            ->selectRaw('SUM(`negative-sum`) as negative_sum')
            ->selectRaw('SUM(`water-volume`) as water_volume')
            ->selectRaw('SUM(`water-sum`) as water_sum')
            ->selectRaw('SUM(`power-volume`) as power_volume') 
            ->selectRaw('SUM(`power-sum`) as power_sum')
            ->selectRaw('SUM(`trash-volume`) as trash_volume')
            ->selectRaw('SUM(`trash-sum`) as trash_sum')
            ->selectRaw('SUM(`heat-sum`) + SUM(`drainage-sum`) + SUM(`negative-sum`) '
                    . '+ SUM(`water-sum`) + SUM(`power-sum`) + SUM(`trash-sum`) '
                    . 'as total') 
            ->whereIn('year', $year)
            ->whereIn('mounth', $mounth) 
            ->first()
            ->toArray();            
    }

}





