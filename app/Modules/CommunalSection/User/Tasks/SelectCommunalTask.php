<?php

namespace App\Modules\CommunalSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\CommunalSection\Admin\Models\Communal;

class SelectCommunalTask extends BaseTask
{   
    /**
     * Возвращаем информацию для таблицы communals
     *
     * @param int $year, int $id
     * @return array
     */
    public function SelectTable(array $year, int $id): array
    {     
        return Communal::select()
            ->selectRaw("(`heat-sum` + `drainage-sum` + `negative-sum` +"
                . "`water-sum` + `power-sum` + `trash-sum`) AS total")      
            ->whereIn('year', $year)
            ->where('user_id', $id)     
            ->get()
            ->toArray();       
    }
    
    /**
     * Возвращаем информацию для таблицы communals
     * Сводная таблица
     *
     * @param int $year, int $id
     * @return array
     */
    public function SelectTeam(array $year, int $id): array
    {     
        return Communal::select('mounth')
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
            ->whereIn('year', $year)
            ->where('user_id', $id) 
            ->groupBy('mounth')
            ->get()
            ->toArray();               
    }
    
    /**
     * Возвращаем итоговую строку
     * таблицы communals
     *
     * @param array $year, int $id
     * @return array
     */
    public function SelectTotal(array $year, int $id): array
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
            ->where('user_id', $id) 
            ->first()
            ->toArray();            
    }

}





