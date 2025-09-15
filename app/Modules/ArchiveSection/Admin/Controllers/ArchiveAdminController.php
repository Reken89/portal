<?php

namespace App\Modules\ArchiveSection\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\ArchiveSection\Admin\Exports\ExportTable;
use App\Modules\ArchiveSection\Admin\Requests\ExportRequest;
use App\Modules\ArchiveSection\Admin\Dto\ExportDto;
use App\Modules\ArchiveSection\Admin\Actions\SelectInfoAction;

class ArchiveAdminController extends Controller
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
        return view('archive.ofs.admin.table', ['info' => $info]);   
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param
     * @return 
     */
    public function ShowTable()
    {      
        $info = [         
            'email' => Auth::user()->email(),
        ];
        return view('archive.ofs.admin.templates.table', ['info' => $info]);    
    }
       
    /**
     * Выгрузка таблицы в EXCEL
     * 
     * @param 
     * @return Excel
     */
    public function ExportTable(ExportRequest $request)
    {
        $dto = ExportDto::fromRequest($request);
        $info = $this->action(SelectInfoAction::class)->SelectOfs($dto);
        session(['info' => $info]);
        return Excel::download(new ExportTable, 'table.xlsx');
    }
}

