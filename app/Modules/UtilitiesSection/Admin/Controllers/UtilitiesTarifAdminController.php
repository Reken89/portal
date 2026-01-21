<?php

namespace App\Modules\UtilitiesSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Controllers\Controller;
use App\Modules\UtilitiesSection\Admin\Dto\UpdateTariffsDto;
use App\Modules\UtilitiesSection\Admin\Dto\SynchTariffsDto;
use App\Modules\UtilitiesSection\Admin\Requests\UpdateTariffsRequest;
use App\Modules\UtilitiesSection\Admin\Requests\SynchTariffsRequest;
use App\Modules\UtilitiesSection\Admin\Actions\SelectInfoAction;
use App\Modules\UtilitiesSection\Admin\Actions\UpdateInfoAction;

class UtilitiesTarifAdminController extends Controller
{
    private array $mounth = ['null', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
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
            if($mounth[0] == null){
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
        return view('utilities.admin.tariffs', ['info' => $info]);   
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
        
        $info = [
            'name'    => $this->name,
            'tariffs' => $this->action(SelectInfoAction::class)->SelectTariffs($year, $mounth),
            'mounth'  => $mounth[0],
        ];
        return view('utilities.admin.templates.tariffs', ['info' => $info]);   
    }
    
    /**
     * Обновляем тарифы
     *
     * @param UpdateTariffsRequest $request
     * @return bool
     */
    public function UpdateTariffs(UpdateTariffsRequest $request): bool
    {              
        $dto = UpdateTariffsDto::fromRequest($request);
        return $this->action(UpdateInfoAction::class)->UpdateTariffs($dto);  
    }
    
    /**
     * Обновляем тарифы
     * Обновление всех значений (услуг)
     *
     * @param SynchTariffsRequest $request
     * @return
     */
    public function SynchTariffs(SynchTariffsRequest $request)
    {    
        $dto = SynchTariffsDto::fromRequest($request);
        if($dto->mounth == "1"){
            echo "В январе невозможно выполнить синхронизацию!";
        }else{
            $this->action(UpdateInfoAction::class)->UpdateTeam($dto); 
            echo "Синхронизация тарифов выполнена!";
        } 
    }
}








