<?php

namespace App\Modules\AdminSection\Tasks;

use App\Modules\AdminSection\Dto\AddUserDto;
use Illuminate\Support\Facades\Hash;
use App\Core\Tasks\BaseTask;
use App\Models\User;

class AddUserTask extends BaseTask
{   
    /**
     * Добавляем нового пользователя
     *
     * @param AddUserDto $dto
     * @return bool
     */
    public function AddUser(AddUserDto $dto): bool
    {        
        $result = User::create([
            'name'     => $dto->name,
            'email'    => $dto->email,
            'password' => Hash::make($dto->password),
            'role'     => $dto->role,
        ]);       
        return $result == true ? true : false;
    }
}

