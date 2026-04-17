<?php

namespace App\Modules\ForecastSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;

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

        $info = [
            'status' => true,
            'table'  => $request->table,
        ];

        return view('forecast.admin.tables.table', compact('info'));    
    }
}



