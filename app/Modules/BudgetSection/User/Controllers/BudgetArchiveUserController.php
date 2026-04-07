<?php

namespace App\Modules\BudgetSection\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Core\Controllers\Controller;
use App\Modules\BudgetSection\Admin\Actions\SelectInfoAction;
use App\Modules\BudgetSection\Admin\Actions\CalculateInfoAction;

class BudgetArchiveUserController extends Controller
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
            return view('budget.user.archive', ['info' => ['status' => false, 'email' => Auth::user()->email()]]);
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

        return view('budget.user.archive', compact('info'));  
    }
}







