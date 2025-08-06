<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;
use App\Modules\DeloSection\Actions\DeloSelect;

class DeloOutController extends Controller
{
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView()
    {
        return view('delo.out');   
    }
    
    /**
     * Получить информацию из БД
     * Для отображения выбранной таблицы
     *
     * @param 
     */
    public function ShowTable()
    {
        $info = $this->action(DeloSelect::class)->SelectAll("out"); 
        return view('delo.templates.out', ['info' => $info]);   
    }
}



