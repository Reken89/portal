<?php

namespace App\Modules\BudgetSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;

class BudgetAdminController extends Controller
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
            'user_id' => $request->user_id ?? null,
            'year'    => $request->year ?? null,
            'email'   => Auth::user()->email(),
        ];

        return view('budget.admin.work', compact('info'));  
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param Request $request
     * @return View
     */
    public function showTable(Request $request): View
    {  
        $info = [
        ];

        return view('budget.admin.templates.table', compact('info'));    
    }
}






