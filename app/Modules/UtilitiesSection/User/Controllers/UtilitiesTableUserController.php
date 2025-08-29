<?php

namespace App\Modules\UtilitiesSection\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\UtilitiesSection\User\Actions\SelectInfoAction;

class UtilitiesTableUserController extends Controller
{
    private array $mounth = ['null', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
    private array $type = ['heat', 'water', 'drainage', 'power', 'trash', 'negative'];
    private array $name = ['Теплоснабжение', 'Водоснабжение', 'Водоотведение', 'Электроснабжение', 'Вывоз мусора', 'Негативное воздействие'];
    
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView(Request $request)
    {
        if(isset($request->mounth)){
            $mounth = $request->mounth;
        }else{
            $mounth = [ltrim(date('m') - 1, "0")];
            if($mounth == 0){
                $mounth = [1];
            }
        }
        
        $year = [2026];
        $mounth_name = $this->mounth[$mounth[0]];       
        
        $info = [
            'email'       => Auth::user()->email(),
            'mounth_name' => $mounth_name,
            'year'        => $year,
            'mounth'      => $mounth,
        ];
        session(['info' => $info]);
        return view('utilities.user.table', ['info' => $info]);   
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param Request $request
     * @return 
     */
    public function ShowTable(Request $request)
    {      
        if(session('option') == NULL || session('option') == FALSE){
            $year = $request->year;
            $mounth = $request->mounth;
            session(['year' => $year]);
            session(['mounth' => $mounth]);
        }else{
            $year = session('year');
            $mounth = session('mounth');
            session(['option' => false]); 
        }
        
        $id = Auth::user()->id();
        $info = [
            'year'      => $year,
            'mounth'    => $mounth,
            'type'      => $this->type,
            'name'      => $this->name,
            'utilities' => $this->action(SelectInfoAction::class)->SelectUtilities($year, $mounth, $id),
        ];
        
        return view('utilities.user.templates.table', ['info' => $info]); 
    }
    
    /**
     * Выгрузка таблицы в EXCEL
     * 
     * @param 
     * @return Excel
     */
    public function ExportTable()
    { 
     
    }
}







