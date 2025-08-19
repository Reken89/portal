<?php

namespace App\Modules\CommunalSection\Admin\Controllers;

use Illuminate\Http\Request;
use App\Core\Controllers\Controller;
use App\Modules\CommunalSection\Admin\Actions\SelectInfoAction;

class CommunalAdminController extends Controller
{
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
            $info = [
                'communals' => $this->action(SelectInfoAction::class)->SelectCommunals($request->year, $request->mounth),
            ];
        }else{
            $info = [
                'communals' => $this->action(SelectInfoAction::class)->SelectCommunals([date('Y')], [ltrim(date('m'), "0")]),
            ];
        }
        return view('communal.templates.admin', ['info' => $info]);   
    }
}

