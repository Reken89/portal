<?php

namespace App\Modules\AdminSection\Controllers;

use App\Core\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\AdminSection\Requests\AddUserRequest;
use App\Modules\AdminSection\Requests\UpdateUserInfoRequest;
use App\Modules\AdminSection\Actions\AddInfoAction;
use App\Modules\AdminSection\Actions\SelectInfoAction;
use App\Modules\AdminSection\Actions\UpdateInfoAction;
use App\Modules\AdminSection\Dto\AddUserDto;
use App\Modules\AdminSection\Dto\UpdateUserInfoDto;

class AdministratorController extends Controller
{
     /**
     * Front отрисовка страницы
     *
     * @param 
     * @return 
     */
    public function FrontView(Request $request)
    {
        if($request->code == "teatr"){
            return view('admin.menu');
        }else{
            return redirect('/home');
        } 
    }
    
    /**
     * Получить информацию из БД
     *
     * @param 
     */
    public function ShowTable()
    {
        $info = [
            'users' => $this->action(SelectInfoAction::class)->SelectUsers(),
        ]; 
        return view('admin.templates.menu', ['info' => $info]);   
    }
    
    /**
     * Добавляем пользователя
     *
     * @param AddUserRequest $request
     */
    public function AddUser(AddUserRequest $request)
    {
        $dto = AddUserDto::fromRequest($request);
        $result = $this->action(AddInfoAction::class)->AddUser($dto);
        return $result == true ? "Пользователь добавлен" : "Что-то пошло не так...";
    }
    
    /**
     * Обновляем информацию о пользователе
     *
     * @param UpdateUserInfoRequest $request
     */
    public function UpdateInfo(UpdateUserInfoRequest $request)
    {
        $dto = UpdateUserInfoDto::fromRequest($request);
        $this->action(UpdateInfoAction::class)->UpdateInfo($dto);
    }
}
