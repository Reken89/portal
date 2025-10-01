<?php

namespace App\Modules\OfsSection\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Controllers\Controller;
use App\Modules\OfsSection\User\Actions\SelectInfoAction;
use App\Modules\OfsSection\User\Actions\UpdateInfoAction;
use App\Modules\OfsSection\User\Dto\UpdateOfsDto;
use App\Modules\OfsSection\User\Requests\UpdateOfsRequest;

class OfsWorkUserController extends Controller
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
            $user = $request->user;
            $chapter = $request->chapter;
        }else{
            $user = NULL;
            $chapter = NULL;
        }
        
        $id = Auth::user()->id();
        $mounth = $this->action(SelectInfoAction::class)->SelectMounth($id);
        $info = [
            'email'   => Auth::user()->email(),
            'role'    => Auth::user()->role(),
            'mounth'  => $this->mounth[$mounth['mounth']],
            'user'    => $user,
            'chapter' => $chapter,
        ];
        return view('ofs.user.work', ['info' => $info]);   
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
            $info = [
                'status' => true,
                'ofs'    => $this->action(SelectInfoAction::class)->SelectInfo($request->user, $request->chapter),
            ];
        }else{
            $info = [
                'status' => false,
            ];          
        }

        return view('ofs.user.templates.table', ['info' => $info]);     
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

