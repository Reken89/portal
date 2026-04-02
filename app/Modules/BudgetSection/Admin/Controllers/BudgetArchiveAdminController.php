<?php

namespace App\Modules\BudgetSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\BudgetSection\Admin\Actions\SelectInfoAction;
use App\Modules\BudgetSection\Admin\Actions\CalculateInfoAction;

class BudgetArchiveAdminController extends Controller
{      
     /**
     * Front отрисовка страницы
     *
     * @param Request $request
     * @return View
     */
    public function frontView(Request $request): View
    {     
        // 1. Сразу выходим, если юзера нет
        if (!$request->variant) {
            return view('budget.admin.archive', ['info' => ['status' => false, 'email' => Auth::user()->email()]]);
        }
        
        $budget = $this->action(SelectInfoAction::class)
            ->selectArchive($request->year);
        
        $info = [
            'status'  => true,
            'variant' => $request->variant ?? null,
            'year'    => $request->year ?? null,
            'email'   => Auth::user()->email(),
            'budget'  => $budget,
            'total'   => $this->action(CalculateInfoAction::class)->selectTotal($budget),
        ];

        return view('budget.admin.archive', compact('info'));  
    }

}







