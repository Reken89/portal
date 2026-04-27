<?php

namespace App\Modules\ForecastSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use Illuminate\Support\Facades\DB;
use App\Modules\ForecastSection\Admin\Models\ForecastCommunal;

class CalculateInfoTask extends BaseTask
{   
    /**
     * Обновляем объемы
     * Первое полугодие
     *
     * @param array $info, int $year
     * @return bool
     */
    public function updateVolH1(array $info, int $year): bool
    {     
        $result = ForecastCommunal::query()
            ->where('year', $year)    
            ->where('user_id', $info['user_id'])
            ->update([
                'vol_budget_h1' => DB::raw("CASE 
                    WHEN title = 'heat' THEN {$info['mb_volume_heat']}
                    WHEN title = 'water' THEN {$info['mb_volume_water']}
                    WHEN title = 'drainage' THEN {$info['mb_volume_drainage']}
                    WHEN title = 'power' THEN {$info['mb_volume_power']}
                    WHEN title = 'trash' THEN {$info['mb_volume_trash']}
                    WHEN title = 'negative' THEN {$info['mb_volume_negative']}    
                    ELSE vol_budget_h1
                END"),
                'vol_business_h1' => DB::raw("CASE 
                    WHEN title = 'heat' THEN {$info['pd_volume_heat']}
                    WHEN title = 'water' THEN {$info['pd_volume_water']}
                    WHEN title = 'drainage' THEN {$info['pd_volume_drainage']}
                    WHEN title = 'power' THEN {$info['pd_volume_power']}
                    WHEN title = 'trash' THEN {$info['pd_volume_trash']}
                    WHEN title = 'negative' THEN {$info['pd_volume_negative']}    
                    ELSE vol_business_h1
                END")    
            ]); 
        return $result == true ? true : false;
    }
    
    /**
     * Обновляем суммы
     * Первое полугодие
     *
     * @param array $info, int $year
     * @return bool
     */
    public function updateSumH1(array $info, int $year): bool
    {     
        $result = ForecastCommunal::query()
            ->where('year', $year)    
            ->where('user_id', $info['user_id'])
            ->update([
                'sum_budget_h1' => DB::raw("CASE 
                    WHEN title = 'heat' THEN {$info['mb_volume_heat']}
                    WHEN title = 'water' THEN {$info['mb_volume_water']}
                    WHEN title = 'drainage' THEN {$info['mb_volume_drainage']}
                    WHEN title = 'power' THEN {$info['mb_volume_power']}
                    WHEN title = 'trash' THEN {$info['mb_volume_trash']}
                    WHEN title = 'negative' THEN {$info['mb_volume_negative']}    
                    ELSE sum_budget_h1
                END"),
                'sum_business_h1' => DB::raw("CASE 
                    WHEN title = 'heat' THEN {$info['pd_volume_heat']}
                    WHEN title = 'water' THEN {$info['pd_volume_water']}
                    WHEN title = 'drainage' THEN {$info['pd_volume_drainage']}
                    WHEN title = 'power' THEN {$info['pd_volume_power']}
                    WHEN title = 'trash' THEN {$info['pd_volume_trash']}
                    WHEN title = 'negative' THEN {$info['pd_volume_negative']}    
                    ELSE sum_business_h1
                END")    
            ]); 
        return $result == true ? true : false;
    }
    
    /**
     * Обновляем объемы
     * Второе полугодие
     *
     * @param array $info, int $year
     * @return bool
     */
    public function updateVolH2(array $info, int $year): bool
    {     
        $result = ForecastCommunal::query()
            ->where('year', $year)    
            ->where('user_id', $info['user_id'])
            ->update([
                'vol_budget_h2' => DB::raw("CASE 
                    WHEN title = 'heat' THEN {$info['heat']}
                    WHEN title = 'water' THEN {$info['water']}
                    WHEN title = 'drainage' THEN {$info['drainage']}
                    WHEN title = 'power' THEN {$info['power']}
                    WHEN title = 'trash' THEN {$info['trash']}
                    WHEN title = 'negative' THEN {$info['negative']}    
                    ELSE vol_budget_h2
                END")
            ]); 
        return $result == true ? true : false;
    }
    
    /**
     * Обновляем суммы
     * Второе полугодие
     *
     * @param array $info, int $year
     * @return bool
     */
    public function updateSumH2(array $info, int $year): bool
    {     
        $result = ForecastCommunal::query()
            ->where('year', $year)    
            ->where('user_id', $info['user_id'])
            ->update([
                'sum_budget_h2' => DB::raw("CASE 
                    WHEN title = 'heat' THEN {$info['heat']}
                    WHEN title = 'water' THEN {$info['water']}
                    WHEN title = 'drainage' THEN {$info['drainage']}
                    WHEN title = 'power' THEN {$info['power']}
                    WHEN title = 'trash' THEN {$info['trash']}
                    WHEN title = 'negative' THEN {$info['negative']}    
                    ELSE sum_budget_h2
                END")   
            ]); 
        return $result == true ? true : false;
    }
}