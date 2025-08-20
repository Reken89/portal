<?php

namespace App\Modules\CommunalSection\Admin\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\CommunalSection\Admin\Actions\SelectInfoAction;
use App\Modules\CommunalSection\Admin\Exports\ExportTable;

class CommunalAdminController extends Controller
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
        return view('communal.admin', ['info' => $info]);   
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param Request $request
     * @return 
     */
    public function ShowTable(Request $request)
    {      
        if(isset($request->year) && isset($request->mounth)){
            $year = $request->year;
            $mounth = $request->mounth;
        }else{
            $year = [date('Y')];
            $mounth = [ltrim(date('m') - 1, "0")];
            if($mounth == 0){
                $mounth = 1;
            }
        }
        
        $mounth_name = [];       
        foreach ($mounth as $key => $value) {
            $mounth_name[$key] = $this->mounth[$value];
        }
        
        $info = [
            'communals'   => $this->action(SelectInfoAction::class)->SelectCommunals($year, $mounth),
            'variant'     => $this->action(SelectInfoAction::class)->DefineVariant($year, $mounth),
            'year'        => $year,
            'mounth_name' => $mounth_name,
            'total'       => $this->action(SelectInfoAction::class)->SelectTotal($year, $mounth),
        ];
        session(['info' => $info]);
        return view('communal.templates.admin', ['info' => $info]);   
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
}

