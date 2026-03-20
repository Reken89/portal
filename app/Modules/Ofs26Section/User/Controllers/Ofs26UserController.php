<?php

namespace App\Modules\Ofs26Section\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Controllers\Controller;
use App\Modules\Ofs26Section\User\Actions\SelectInfoAction;
use App\Modules\Ofs26Section\User\Actions\CalculateInfoAction;
use App\Modules\Ofs26Section\User\Actions\UpdateInfoAction;
use App\Modules\Ofs26Section\User\Requests\UpdateOfsRequest;
use App\Modules\Ofs26Section\User\Dto\UpdateOfsDto;

class Ofs26UserController extends Controller
{   
    private array $mounth = ['null', 'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
    private array $chapter = ['null', 'МБ МЗ(МБ)', 'МБ ИЦ', 'РК МЗ(РК)', 'РК ИЦ', 'ПД'];
    
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView(Request $request)
    {      
        if($request->user){            
            $info = [
                'user'    => $request->user,
                'chapter' => $request->chapter,
                'mounth'  => $request->mounth,
                'email'   => Auth::user()->email(),
                'role'    => Auth::user()->role(),
            ];
        }else{
            $info = [
                'user'    => NULL,
                'chapter' => NULL,
                'mounth'  => NULL,
                'email'   => Auth::user()->email(),
                'role'    => Auth::user()->role(),
            ];
        }
        return view('ofs26.user.work', ['info' => $info]);   
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param
     * @return 
     */
    public function ShowTable(Request $request)
    {  
        if($request->user !== NULL){ 
            $ofs = $this->action(SelectInfoAction::class)->SelectInfo($request->user, $request->mounth, $request->chapter);
            $info = [
                'status'    => true,
                'ofs'       => $ofs,
                'structure' => "open",
                'chapter'   => $this->chapter,
                'mounth'    => $this->mounth,
                'total'     => $this->action(CalculateInfoAction::class)->SelectTotal($ofs),
            ];
        }else{
            $info = [
                'status' => false,   
            ];          
        }
        return view('ofs26.user.templates.table', ['info' => $info]);     
    }
    
    /**
     * Получаем информацию из БД
     *
     * @param UpdateOfsRequest $request
     * @return 
     */
    public function UpdateOfs(UpdateOfsRequest $request)
    {  
        $dto = UpdateOfsDto::fromRequest($request);   
        $this->action(UpdateInfoAction::class)->UpdateOfs($dto);
    }

}



