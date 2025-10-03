<?php

namespace App\Modules\OfsSection\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Controllers\Controller;
use App\Modules\OfsSection\User\Dto\SynchOfsDto;
use App\Modules\OfsSection\User\Requests\SynchOfsRequest;
use App\Modules\OfsSection\User\Actions\SelectInfoAction;
use App\Modules\OfsSection\User\Actions\UpdateInfoAction;

class OfsEditorUserController extends Controller
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
        return view('ofs.user.editor');   
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
            'email'   => Auth::user()->email(),
            'role'    => Auth::user()->role(),
            'hi100ry' => $this->action(SelectInfoAction::class)->SelectHi100ry(),
            'mounth'  => $this->mounth,
        ];
        return view('ofs.user.templates.editor', ['info' => $info]);     
    }
    
    /**
     * Синхронизация OFS
     *
     * @param
     * @return 
     */
    public function SynchOfs(SynchOfsRequest $request)
    {  
        $dto = SynchOfsDto::fromRequest($request);  
        $this->action(UpdateInfoAction::class)->SynchOfs($dto);
        echo "Синхронизация завершена!";
    }

}

