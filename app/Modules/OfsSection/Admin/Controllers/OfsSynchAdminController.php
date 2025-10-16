<?php

namespace App\Modules\OfsSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Controllers\Controller;
use App\Modules\OfsSection\Admin\Actions\UpdateInfoAction;
use App\Modules\OfsSection\Admin\Dto\SynchOfsDto;
use App\Modules\OfsSection\Admin\Requests\SynchOfsRequest;

class OfsSynchAdminController extends Controller
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
        return view('ofs.admin.synch');   
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
            'email' => Auth::user()->email(),
        ];
        return view('ofs.admin.templates.synch', ['info' => $info]);     
    }
    
    /**
     * Копируем информацию
     * Из месяца в месяц
     *
     * @param
     * @return 
     */
    public function CopyOfs(SynchOfsRequest $request)
    {  
        $dto = SynchOfsDto::fromRequest($request); 
        $result = $this->action(UpdateInfoAction::class)->UpdateOfs($dto);
        if($result == true){
            echo "Выполнено успешно!";
        }else{
            $mounth = $this->mounth[$dto->mounth];
            echo "Не выполнено! Так как $mounth не заполнен!";
        }
    }

}
