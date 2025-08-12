<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;
use App\Modules\DeloSection\Actions\DeloSelect;

class DeloInController extends Controller
{
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView()
    {
        return view('delo.in');   
    }
    
    /**
     * Получить информацию из БД
     * Для отображения выбранной таблицы
     *
     * @param 
     */
    public function ShowTable()
    {
        $info = $this->action(DeloSelect::class)->SelectAll("in"); 
        return view('delo.templates.in', ['info' => $info]);   
    }
}

