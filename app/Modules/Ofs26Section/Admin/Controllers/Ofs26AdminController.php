<?php

namespace App\Modules\Ofs26Section\Admin\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\Ofs26Section\Admin\Exports\ExportTable;
use App\Modules\Ofs26Section\Admin\Actions\CalculateInfoAction;
use App\Modules\Ofs26Section\Admin\Actions\SelectInfoAction;
use App\Modules\Ofs26Section\Admin\Actions\UpdateInfoAction;
use App\Modules\Ofs26Section\Admin\Requests\ExportRequest;
use App\Modules\Ofs26Section\Admin\Requests\UpdateOfsStatusRequest;
use App\Modules\Ofs26Section\Admin\Dto\UpdateOfsStatusDto;
use App\Modules\Ofs26Section\Admin\Dto\ExportDto;

class Ofs26AdminController extends Controller
{      
     /**
     * Front отрисовка страницы
     *
     * @return View
     */
    public function frontView(): View
    {      
        $info = [
            'email'   => Auth::user()->email(),
            'counter' => $this->action(SelectInfoAction::class)->selectCounter(1),
            'matrix'  => $this->action(SelectInfoAction::class)->selectMatrix(),
        ];
        return view('ofs26.admin.work', compact('info'));  
    }
    
    /**
     * Выгрузка таблицы в EXCEL
     * 
     * @param ExportRequest $request
     */
    public function exportTable(ExportRequest $request)
    {
        $dto = ExportDto::fromRequest($request);
        $this->action(UpdateInfoAction::class)->updateCounter(1); //Обновляем статистику
        $ofs = $this->action(SelectInfoAction::class)->selectInfo($dto);
        $data = [
            'ofs' => $ofs,
            'total' => $this->action(CalculateInfoAction::class)->sumInfo($ofs),
        ];
        return Excel::download(new ExportTable($data), 'table.xlsx');
    }
    
    /**
     * Меняем статус
     *
     * @param UpdateOfsStatusRequest $request
     * @return JsonResponse
     */
    public function updateStatus(UpdateOfsStatusRequest $request): JsonResponse
    {  
        $dto = UpdateOfsStatusDto::fromRequest($request); 
        $this->action(UpdateInfoAction::class)->updateCounter(1); //Обновляем статистику
        $isUpdated = $this->action(UpdateInfoAction::class)->updateStatus($dto);

        return $isUpdated 
            ? response()->json(['message' => 'Таблица открыта!'])
            : response()->json(['message' => 'Таблица уже была открыта ранее!'], 400);
    }
}




