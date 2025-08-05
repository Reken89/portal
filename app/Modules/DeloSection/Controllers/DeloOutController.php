<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;

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
        return view('delo.templates.out');   
    }
}



