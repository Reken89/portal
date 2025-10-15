<?php

namespace App\Modules\OfsSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\OfsSection\Admin\Actions\UpdateInfoAction;
use App\Modules\OfsSection\Admin\Actions\SelectInfoAction;
use App\Modules\OfsSection\Admin\Dto\UpdateRulesDto;
use App\Modules\OfsSection\Admin\Dto\ExportDto;
use App\Modules\OfsSection\Admin\Requests\UpdateRulesRequest;
use App\Modules\OfsSection\Admin\Requests\ExportRequest;
use App\Modules\OfsSection\Admin\Exports\ExportTable;

class OfsWorkAdminController extends Controller
{   
    private array $mounth = ['null', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
    private array $chapter = ['null', 'МБ МЗ(МБ)', 'МБ ИЦ', 'РК МЗ(РК)', 'РК ИЦ', 'ПД'];
    
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView()
    {
        return view('ofs.admin.work');   
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param
     * @return 
     */
    public function ShowTable()
    {  
        $info = [
            'finish'  => $this->action(SelectInfoAction::class)->SelectRules(1),
            'old'     => $this->action(SelectInfoAction::class)->SelectRules(2),
            'counter' => $this->action(SelectInfoAction::class)->SelectCounter(),
            'email'   => Auth::user()->email(),
        ];
        return view('ofs.admin.templates.work', ['info' => $info]);     
    }
    
    /**
     * Обновляем правила
     * Дата сдачи отчета
     * Редактирование прежних месяцев
     *
     * @param
     * @return 
     */
    public function UpdateRules(UpdateRulesRequest $request)
    {  
        $dto = UpdateRulesDto::fromRequest($request);
        $this->action(UpdateInfoAction::class)->UpdateRules($dto);
    }
    
    /**
     * Выгрузка таблицы в EXCEL
     * 
     * @param 
     * @return Excel
     */
    public function ExportTable(ExportRequest $request)
    {
        $dto = ExportDto::fromRequest($request);
        $info = $this->action(SelectInfoAction::class)->SelectOfs($dto);
        $this->action(UpdateInfoAction::class)->UpdateCounter();
        session(['info' => $info]);
        return Excel::download(new ExportTable, 'table.xlsx');
    }
}
