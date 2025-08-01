<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;

class DeloController extends Controller
{
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView(string $variant)
    {
        return view('delo.delo', ['variant' => $variant]);   
    }
    
    /**
     * Получить информацию из БД
     * Для отображения выбранной таблицы
     *
     * @param 
     */
    public function ShowTable()
    {
        return view('delo.templates.table');   
    }
}



