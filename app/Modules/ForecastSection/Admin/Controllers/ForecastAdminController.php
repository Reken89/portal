<?php

namespace App\Modules\ForecastSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\ForecastSection\Admin\Requests\UpdateTariffRequest;
use App\Modules\ForecastSection\Admin\Dto\UpdateTariffDto;
use App\Modules\ForecastSection\Admin\Actions\SelectInfoAction;
use App\Modules\ForecastSection\Admin\Actions\UpdateInfoAction;
use App\Modules\ForecastSection\Admin\Actions\CalculateInfoAction;

class ForecastAdminController extends Controller
{      
     /**
     * Front отрисовка страницы
     *
     * @param Request $request
     * @return View
     */
    public function frontView(Request $request): View
    {      
        $info = [
            'table'    => $request->table ?? null,
            'email'   => Auth::user()->email(),
        ];

        return view('forecast.admin.work', compact('info'));  
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param Request $request
     * @return View
     */
    public function showTable(Request $request): View
    {  
        // 1. Сразу выходим, если таблица не выбрана
        if (!$request->table) {
            return view('forecast.admin.tables.table', ['info' => ['status' => false]]);
        }

        $table = $this->action(SelectInfoAction::class)->selectInfo($request->table);
        
        $info = [
            'status' => true,
            'table'  => $request->table,
            'info'   => $table,
            'total'  => $this->action(CalculateInfoAction::class)->selectTotal($request->table, $table),
            'month'  => ['1' => 'январь', '2' => 'февраль', '3' => 'март', '4' => 'апрель', 
                '5' => 'май', '6' => 'июнь', '7' => 'июль', '8' => 'август', '9' => 'сентябрь', 
                '10' => 'октябрь', '11' => 'ноябрь', '12' => 'декабрь'],
        ];

        return view('forecast.admin.tables.table', compact('info'));    
    }
    
    /**
     * Обновляем тариф
     *
     * @param UpdateTariffRequest $request
     * @return JsonResponse
     */
    public function updateTariff(UpdateTariffRequest $request): JsonResponse
    {
        $dto = UpdateTariffDto::fromRequest($request);
        $result = $this->action(UpdateInfoAction::class)->updateTariff($dto);
        return $result 
            ? response()->json(null, 204) 
            : response()->json(null, 500);
    }
}



