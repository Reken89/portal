<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Modules\DeloSection\Actions\DeloSelect;

class DeloDspOutController extends Controller
{
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return View
     */
    public function frontView(): View
    {
        return view('delo.dspout');   
    }
    
    /**
     * Получить информацию из БД
     * Для отображения выбранной таблицы
     *
     * @param 
     * @return View
     */
    public function showTable(): View
    {
        return view('delo.templates.dspout');   
    }
}
