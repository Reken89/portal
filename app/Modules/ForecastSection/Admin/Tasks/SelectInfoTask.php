<?php

namespace App\Modules\ForecastSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use Illuminate\Support\Facades\DB;
use App\Modules\UtilitiesSection\Admin\Models\Utilities;
use App\Modules\CommunalSection\Admin\Models\Communal;

class SelectInfoTask extends BaseTask
{   
    /**
     * Получаем информацию
     * Объем за первое полугодие
     *
     * @param int $year, array $users, array $months
     * @return array
     */
    public function selectVolH1(int $year, array $users, array $months): array
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
            ->groupBy('user_id')
            ->get()
            ->toArray();       
    }
    
    /**
     * Получаем информацию
     * Объем за первое полугоди
     * Умноженный на тарифы
     *
     * @param int $year, array $users, array $months
     * @return array
     */
    public function selectSumH1(int $year, array $users, array $months): array
    {     
        return DB::table('utilities as u')
            // Прописываем JOIN-ы под каждую услугу
            ->join('forecast_tariffs as tw', function($j) {
                $j->on('u.year', '=', 'tw.year')->on('u.mounth', '=', 'tw.month')->where('tw.title', 'water');
            })
            ->join('forecast_tariffs as th', function($j) {
                $j->on('u.year', '=', 'th.year')->on('u.mounth', '=', 'th.month')->where('th.title', 'heat');
            })
            ->join('forecast_tariffs as td', function($j) {
                $j->on('u.year', '=', 'td.year')->on('u.mounth', '=', 'td.month')->where('td.title', 'drainage');
            })
            ->join('forecast_tariffs as tn', function($j) {
                $j->on('u.year', '=', 'tn.year')->on('u.mounth', '=', 'tn.month')->where('tn.title', 'negative');
            })
            ->join('forecast_tariffs as tp', function($j) {
                $j->on('u.year', '=', 'tp.year')->on('u.mounth', '=', 'tp.month')->where('tp.title', 'power');
            })
            ->join('forecast_tariffs as tt', function($j) {
                $j->on('u.year', '=', 'tt.year')->on('u.mounth', '=', 'tt.month')->where('tt.title', 'trash');
            })
            // Фильтры
            ->where('u.year', $year)
            ->whereIn('u.user_id', $users)
            ->whereIn('u.mounth', $months)
            // Магия умножения и суммирования
            ->select(
                'u.user_id',
                DB::raw('SUM(u.mb_volume_water * tw.tariff) as mb_volume_water'),
                DB::raw('SUM(u.pd_volume_water * tw.tariff) as pd_volume_water'),

                DB::raw('SUM(u.mb_volume_heat * th.tariff) as mb_volume_heat'),
                DB::raw('SUM(u.pd_volume_heat * th.tariff) as pd_volume_heat'),

                DB::raw('SUM(u.mb_volume_drainage * td.tariff) as mb_volume_drainage'),
                DB::raw('SUM(u.pd_volume_drainage * td.tariff) as pd_volume_drainage'),

                DB::raw('SUM(u.mb_volume_negative * tn.tariff) as mb_volume_negative'),
                DB::raw('SUM(u.pd_volume_negative * tn.tariff) as pd_volume_negative'),

                DB::raw('SUM(u.mb_volume_power * tp.tariff) as mb_volume_power'),
                DB::raw('SUM(u.pd_volume_power * tp.tariff) as pd_volume_power'),

                DB::raw('SUM(u.mb_volume_trash * tt.tariff) as mb_volume_trash'),
                DB::raw('SUM(u.pd_volume_trash * tt.tariff) as pd_volume_trash')
            )
            ->groupBy('u.user_id')
            ->get()
            ->map(fn($item) => (array)$item)
            ->toArray();   
    }
    
    /**
     * Получаем информацию
     * Объем за второе полугодие
     *
     * @param int $year, array $users, array $months
     * @return array
     */
    public function selectVolH2(int $year, array $users, array $months): array
    {     
        return Communal::select('user_id')   
            ->selectRaw('SUM(`heat-volume`) as heat')   
            ->selectRaw('SUM(`drainage-volume`) as drainage')
            ->selectRaw('SUM(`negative-volume`) as negative')
            ->selectRaw('SUM(`water-volume`) as water')      
            ->selectRaw('SUM(`power-volume`) as power')    
            ->selectRaw('SUM(`trash-volume`) as trash')        
            ->where('year', $year)   
            ->whereIn('user_id', $users)
            ->whereIn('mounth', $months)
            ->groupBy('user_id')
            ->get()
            ->toArray();       
    }
    
    /**
     * Получаем информацию
     * Объем за второе полугоди
     * Умноженный на тарифы
     *
     * @param int $year, array $users, array $months
     * @return array
     */
    public function selectSumH2(int $year, array $users, array $months): array
    {     
        return DB::table('communals as u')
            // Прописываем JOIN-ы под каждую услугу
            ->join('forecast_tariffs as tw', function($j) {
                $j->where('tw.year', 2026)->on('u.mounth', '=', 'tw.month')->where('tw.title', 'water');
            })
            ->join('forecast_tariffs as th', function($j) {
                $j->where('th.year', 2026)->on('u.mounth', '=', 'th.month')->where('th.title', 'heat');
            })
            ->join('forecast_tariffs as td', function($j) {
                $j->where('td.year', 2026)->on('u.mounth', '=', 'td.month')->where('td.title', 'drainage');
            })
            ->join('forecast_tariffs as tn', function($j) {
                $j->where('tn.year', 2026)->on('u.mounth', '=', 'tn.month')->where('tn.title', 'negative');
            })
            ->join('forecast_tariffs as tp', function($j) {
                $j->where('tp.year', 2026)->on('u.mounth', '=', 'tp.month')->where('tp.title', 'power');
            })
            ->join('forecast_tariffs as tt', function($j) {
                $j->where('tt.year', 2026)->on('u.mounth', '=', 'tt.month')->where('tt.title', 'trash');
            })
            // Фильтры
            ->where('u.year', $year)
            ->whereIn('u.user_id', $users)
            ->whereIn('u.mounth', $months)
            // Магия умножения и суммирования
            ->select(
                'u.user_id',
                DB::raw('SUM(u.`water-volume` * tw.tariff) as water'),
                DB::raw('SUM(u.`heat-volume` * th.tariff) as heat'),
                DB::raw('SUM(u.`drainage-volume` * td.tariff) as drainage'),
                DB::raw('SUM(u.`negative-volume` * tn.tariff) as negative'),
                DB::raw('SUM(u.`power-volume` * tp.tariff) as power'),
                DB::raw('SUM(u.`trash-volume` * tt.tariff) as trash'),
            )
            ->groupBy('u.user_id')
            ->get()
            ->map(fn($item) => (array)$item)
            ->toArray();   
    }
    
    /**
     * Получаем информацию
     * Статус ошибок
     *
     * @param int $year, array $users
     * @return array
     */
    public function selectStatus(int $year, array $users): array
    {     
        return Utilities::whereIn('user_id', $users)
            ->where('year', $year)
            ->get()
            ->groupBy('mounth')
            ->map(function ($items) {
                return $items->every('status', 1);
            })
            ->toArray();      
    }
}
