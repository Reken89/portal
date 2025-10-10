<?php

namespace App\Modules\OfsSection\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Controllers\Controller;
use App\Modules\OfsSection\User\Actions\SelectInfoAction;
use App\Modules\OfsSection\User\Actions\UpdateInfoAction;
use App\Modules\OfsSection\User\Actions\CalculateInfoAction;
use App\Modules\OfsSection\User\Actions\StructureAction;
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
            $mn = $this->action(SelectInfoAction::class)->SelectMounth($user);
            $mounth = $this->mounth[$mn];
        }else{
            $user = NULL;
            $chapter = NULL;
            $mounth = "не выбран!";
        }
        
        $info = [
            'email'    => Auth::user()->email(),
            'role'     => Auth::user()->role(),
            'mounth'   => $mounth,
            'user'     => $user,
            'chapter'  => $chapter,
            'max_date' => $this->action(SelectInfoAction::class)->SelectFinish(),           
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
            $ofs = $this->action(SelectInfoAction::class)->SelectInfo($request->user, $request->chapter);
            $info = [
                'status'    => true,
                'ofs'       => $ofs,
                'total'     => $this->action(CalculateInfoAction::class)->SelectTotal($ofs),
                'chapter'   => $this->chapter,
                'structure' => $this->action(StructureAction::class)->DetermineStructure($request->user),
            ];
        }else{
            $info = [
                'status' => false,
            ];          
        }

        return view('ofs.user.templates.table', ['info' => $info]);     
    }
    
    /**
     * Front отрисовка страницы
     * Для полноэкранного режима
     *
     * @param 
     * @return 
     */
    public function ScaleView(Request $request)
    {       
        $info = [
            'user'    => $request->user,
            'chapter' => $request->chapter,          
        ];
        return view('ofs.user.scale', ['info' => $info]);   
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

