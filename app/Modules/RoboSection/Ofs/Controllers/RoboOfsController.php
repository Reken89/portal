<?php

namespace App\Modules\RoboSection\Ofs\Controllers;

use App\Core\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\RoboSection\Ofs\Actions\UpdateInfoAction;
use App\Modules\RoboSection\Ofs\Actions\SynchOfsAction;

class RoboOfsController extends Controller
{
    private int $key = 21052023;
    
     /**
     * Закрытие возможности  
     * редактировать прежние месяца      
     * для ЦБ
     *
     * @param Request $request
     * @return 
     */
    public function ChangeStatus(Request $request): bool
    {
        if(isset($request->key) && $request->key == $this->key){
            return $this->action(UpdateInfoAction::class)->UpdateInfo();
        }else{
            return false;
        }
    }   
    
    /**
     * Синхронизация таблиц
     * ofs и archive26 
     *
     * @param Request $request
     * @return 
     */
    public function SynchOfs(Request $request)
    {
        if(isset($request->key) && $request->key == $this->key){
            return $this->action(SynchOfsAction::class)->SynchOfs();
        }else{
            return false;
        }
    }  
}


