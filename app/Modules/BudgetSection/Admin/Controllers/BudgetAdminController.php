<?php

namespace App\Modules\BudgetSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\BudgetSection\Admin\Dto\BudgetUpdateDto;
use App\Modules\BudgetSection\Admin\Requests\BudgetUpdateRequest;
use App\Modules\BudgetSection\Admin\Actions\SelectInfoAction;
use App\Modules\BudgetSection\Admin\Actions\CalculateInfoAction;
use App\Modules\BudgetSection\Admin\Actions\UpdateInfoAction;

class BudgetAdminController extends Controller
{      
    private string $day_start = "2026-05-01";
    private string $day_stop = "2026-12-01";
    
     /**
     * Front отрисовка страницы
     *
     * @param Request $request
     * @return View
     */
    public function frontView(Request $request): View
    {      
        $info = [
            'table' => $request->table ?? null,
            'year'  => $request->year ?? null,
            'email' => Auth::user()->email(),
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
        // 1. Сразу выходим, если таблица не выбрана
        if (!$request->table) {
            return view('budget.admin.templates.table', ['info' => ['status' => false]]);
        }
        
        $budget = $this->action(SelectInfoAction::class)
            ->selectBudget($request->year);
        
        $today = date('Y-m-d');
        $isOpen = ($today > $this->day_start && $today < $this->day_stop);

        $structure = $isOpen ? "open" : "close";
        
        $info = [
            'status'    => true,
            'table'     => $request->table,
            'structure' => $structure,
            'budget'    => $budget,
            'total'     => $this->action(CalculateInfoAction::class)->selectTotal($budget),
        ];

        return view('budget.admin.templates.table', compact('info'));    
    }
    
    /**
     * Обновляем значения
     *
     * @param BudgetUpdateRequest $request
     * @return 
     */
    public function updateBudget(BudgetUpdateRequest $request): JsonResponse
    { 
        $dto = BudgetUpdateDto::fromRequest($request);
        $result = $this->action(UpdateInfoAction::class)->updateInfo($dto);       
        return $result 
            ? response()->json(null, 204) 
            : response()->json(null, 500);
    }
    
    /**
     * Синхронизируем года бюджета
     *
     * @return 
     */
    public function synchBudget(): JsonResponse
    {     
        $result = $this->action(UpdateInfoAction::class)->synchInfo();       
        return $result 
            ? response()->json(['message' => 'Синхронизация выполнена!'], 200) 
            : response()->json(['message' => 'Значения уже идентичны!'], 200);
    }
}






