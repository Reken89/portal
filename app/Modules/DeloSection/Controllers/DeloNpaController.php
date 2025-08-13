<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;
use App\Modules\DeloSection\Actions\DeloSelect;

class DeloNpaController extends Controller
{
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView()
    {
        return view('delo.npa');   
    }
    
    /**
     * Получить информацию из БД
     * Для отображения выбранной таблицы
     *
     * @param 
     */
    public function ShowTable()
    {
        $info = $this->action(DeloSelect::class)->SelectNpa(); 
        return view('delo.templates.npa', ['info' => $info]);   
    }
}

