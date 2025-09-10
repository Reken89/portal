<?php

namespace App\Modules\ArchiveSection\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Controllers\Controller;
use App\Modules\ArchiveSection\User\Requests\AddParametersRequest;
use App\Modules\ArchiveSection\User\Dto\AddParametersDto;
use App\Modules\ArchiveSection\User\Actions\AddParametersAction;
use App\Modules\ArchiveSection\User\Actions\SelectInfoAction;

class ArchiveUserController extends Controller
{   
    private array $mounth = ['null', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
    private array $chapter = ['null', 'МБ МЗ(МБ)', 'МБ ИЦ', 'РК МЗ(РК)', 'РК ИЦ', 'ПД'];
    
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
     * @param
     * @return 
     */
    public function ShowTable()
    {      
        $info = [         
            'email'      => Auth::user()->email(),
            'role'       => Auth::user()->role(),
            'mounth'     => $this->mounth,
            'chapter'    => $this->chapter,
            'parameters' => $this->action(SelectInfoAction::class)->SelectParameters(),
        ];
        return view('archive.ofs.user.templates.table', ['info' => $info]);    
    }
       
    /**
     * Выгрузка таблицы в EXCEL
     * 
     * @param 
     * @return Excel
     */
    public function ExportTable(Request $request)
    {
        var_dump($request->id);    
    }
    
    /**
     * Добавляем параметры
     * Для запроса
     * 
     * @param 
     * @return 
     */
    public function AddParameters(AddParametersRequest $request)
    { 
        $dto = AddParametersDto::fromRequest($request);
        $this->action(AddParametersAction::class)->AddParameters($dto);    
    }
}

