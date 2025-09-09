<?php

namespace App\Modules\ArchiveSection\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;

class ArchiveUserController extends Controller
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
        return view('archive.ofs.user.table', ['info' => $info]);   
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param Request $request
     * @return 
     */
    public function ShowTable(Request $request)
    {      
        $info = [         
            'email' => Auth::user()->email(),
            'role'  => Auth::user()->role(),
        ];
        return view('archive.ofs.user.templates.table', ['info' => $info]);    
    }
       
    /**
     * Выгрузка таблицы в EXCEL
     * 
     * @param 
     * @return Excel
     */
    public function ExportTable()
    { 
    
    }
}

