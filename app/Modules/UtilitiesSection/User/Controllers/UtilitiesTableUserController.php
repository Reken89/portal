<?php

namespace App\Modules\UtilitiesSection\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\UtilitiesSection\User\Exports\ExportTable;
use App\Modules\UtilitiesSection\User\Dto\UpdateUtilitiesDto;
use App\Modules\UtilitiesSection\User\Dto\UpdateStatusDto;
use App\Modules\UtilitiesSection\User\Requests\UpdateUtilitiesRequest;
use App\Modules\UtilitiesSection\User\Requests\UpdateStatusRequest;
use App\Modules\UtilitiesSection\User\Actions\SelectInfoAction;
use App\Modules\UtilitiesSection\User\Actions\UpdateInfoAction;

class UtilitiesTableUserController extends Controller
{
    private array $mounth = ['null', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
    private array $type = ['heat', 'water', 'drainage', 'power', 'trash', 'negative'];
    private array $name = ['Теплоснабжение', 'Водоснабжение', 'Водоотведение', 'Электроснабжение', 'Вывоз мусора', 'Негативное воздействие'];
    private string $message1 = "Вам разрешено редактировать данные!";
    private string $message2 = "Вы отправили запрос на редактирование в ФЭУ!";
    private string $message3 = "Вы отправили инормацию в ФЭУ!";
    private string $message4 = "В таблице обнаружены ошибки!";
    private string $message5 = "Вы уже отправляли в ФЭУ запрос на редактирование!";
    
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
            'tariffs'   => $this->action(SelectInfoAction::class)->SelectTariffs($year, $mounth),
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
        $info = [
            'utilities' => $this->action(SelectInfoAction::class)->SelectForExcel(Auth::user()->id(), 2026),
            'total'     => $this->action(SelectInfoAction::class)->SelectTotal(Auth::user()->id(), 2026),
            'mounth'    => $this->mounth,
        ];
        session(['info' => $info]);
        return Excel::download(new ExportTable, 'table.xlsx');  
    }
    
    /**
     * Обновление значений
     * 
     * @param UpdateUtilitiesRequest $request
     * @return 
     */
    public function UpdateUtilities(UpdateUtilitiesRequest $request)
    { 
        $dto = UpdateUtilitiesDto::fromRequest($request);
        $this->action(UpdateInfoAction::class)->UpdateUtilities($dto);  
    }
    
    /**
     * Обновление статуса
     * 
     * @param UpdateStatusRequest $request
     * @return 
     */
    public function UpdateStatus(UpdateStatusRequest $request)
    { 
        session(['option' => true]);
        $dto = UpdateStatusDto::fromRequest($request); 
        if($dto->status == 1){
            if (date('d') < 18 && ltrim(date('m'),'0') - 1 == $dto->mounth){
                $this->action(UpdateInfoAction::class)->UpdateStatus($dto->id, 2);
                echo $this->message1;
            }else{
                $this->action(UpdateInfoAction::class)->UpdateStatus($dto->id, 3);
                echo $this->message2;
            }           
        }elseif ($dto->status == 2) {
            $examin = $this->action(UpdateInfoAction::class)->ExaminUtilities($dto, $this->type);
            if($examin == true){
                $this->action(UpdateInfoAction::class)->UpdateStatus($dto->id, 1);
                $this->action(UpdateInfoAction::class)->UpdatePoints(Auth::user()->id());
                echo $this->message3;
            }else{
                echo $this->message4;
            }
        }else{
            echo $this->message5;
        }
    }
}







