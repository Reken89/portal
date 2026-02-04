<?php

namespace App\Modules\CommunalSection\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\CommunalSection\User\Actions\SelectAction;
use App\Modules\CommunalSection\User\Exports\ExportTable;

class CommunalUserController extends Controller
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
        return view('communal.user', ['info' => $info]);   
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param Request $request
     * @return 
     */
    public function ShowTable(Request $request)
    {      
        if(isset($request->year)){
            $year = $request->year;
        }else{
            //$year = [date('Y')];
            $year = [2025];
        }

        $id = Auth::user()->id();
        $variant = count($year) == '1' ? "one" : "team";
        
        $info = [
            'communals' => $this->action(SelectAction::class)->SelectCommunals($year, $id),
            'variant'   => $variant,           
            'email'     => Auth::user()->email(),
            'year'      => $year,
            'mounth'    => $this->mounth,
            'total'     => $this->action(SelectAction::class)->SelectTotal($year, $id),
        ];
        session(['info' => $info]);
        return view('communal.templates.user', ['info' => $info]);   
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

