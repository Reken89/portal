<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;
use App\Modules\DeloSection\Actions\DeloSelect;

class DeloCorrController extends Controller
{
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView()
    {
        return view('delo.corr');   
    }
    
    /**
     * Получить информацию из БД
     * Для отображения выбранной таблицы
     *
     * @param 
     */
    public function ShowTable()
    {
        $info = $this->action(DeloSelect::class)->SelectCorr(); 
        return view('delo.templates.corr', ['info' => $info]);   
    }
}
