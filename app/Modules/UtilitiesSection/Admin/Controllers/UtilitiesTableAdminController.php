<?php

namespace App\Modules\UtilitiesSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\UtilitiesSection\Admin\Exports\ExportTable;
use App\Modules\UtilitiesSection\Admin\Requests\UpdateUtilitiesRequest;
use App\Modules\UtilitiesSection\Admin\Dto\UpdateUtilitiesDto;
use App\Modules\UtilitiesSection\Admin\Actions\UpdateInfoAction;
use App\Modules\UtilitiesSection\Admin\Actions\SelectInfoAction;

class UtilitiesTableAdminController extends Controller
{
    private array $mounth = ['null', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
    
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView()
    {
        $info = [];
        return view('utilities.admin.table', ['info' => $info]);   
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param Request $request
     * @return 
     */
    public function ShowTable(Request $request)
    {  
        if(session('option') == NULL || session('option') == FALSE):
            if(isset($request->mounth)){
                $mounth = $request->mounth;
            }else{
                $mounth = [ltrim(date('m') - 1, "0")];
                if($mounth[0] == null){
                    $mounth = [1];
                }
            }
            session(['mounth' => $mounth]);
        else:
            $mounth = session('mounth');
            session(['option' => false]); 
        endif;
  

        $year = [2026];
        $mounth_name = [];       
        foreach ($mounth as $key => $value) {
            $mounth_name[$key] = $this->mounth[$value];
        }
        
        $info = [
            'email'       => Auth::user()->email(),
            'utilities'   => $this->action(SelectInfoAction::class)->SelectUtilities($year, $mounth),
            'variant'     => $this->action(SelectInfoAction::class)->DefineVariant($year, $mounth),
            'total'       => $this->action(SelectInfoAction::class)->SelectTotal($year, $mounth),
            'mounth_name' => $mounth_name,
        ];
        session(['info' => $info]);
        return view('utilities.admin.templates.table', ['info' => $info]); 
    }
    
    /**
     * Выгрузка таблицы в EXCEL
     * 
     * @param 
     * @return Excel
     */
    public function ExportTable()
    { 
        return Excel::download(new ExportTable, 'table.xlsx');       
    }
    
    /**
     * Обновление статуса
     * 
     * @param UpdateUtilitiesRequest $request
     * @return 
     */
    public function UpdateStatus(UpdateUtilitiesRequest $request)
    { 
        session(['option' => true]);
        $dto = UpdateUtilitiesDto::fromRequest($request);
        $this->action(UpdateInfoAction::class)->UpdateStatus($dto->id, 2);  
    }
}





