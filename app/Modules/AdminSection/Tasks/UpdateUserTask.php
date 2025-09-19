<?php

namespace App\Modules\AdminSection\Tasks;

use App\Modules\AdminSection\Dto\UpdateUserInfoDto;
use App\Modules\AdminSection\Dto\UpdatePasswordDto;
use Illuminate\Support\Facades\Hash;
use App\Core\Tasks\BaseTask;
use App\Models\User;

class UpdateUserTask extends BaseTask
{   
    /**
     * Обновляем информацию о пользователе
     *
     * @param UpdateUserInfoDto $dto
     * @return bool
     */
    public function UpdateInfo(UpdateUserInfoDto $dto): bool
    {        
        $result = User::find($dto->id)
            ->update([                
                'name'  => $dto->name,
                'email' => $dto->email,
                'role'  => $dto->role,
            ]);        
        return $result == true ? true : false;
    }
    
    /**
     * Обновляем пароль пользователя
     *
     * @param UpdatePasswordDto $dto
     * @return bool
     */
    public function UpdatePassword(UpdatePasswordDto $dto): bool
    {        
        $result = User::find($dto->id)
            ->update([                
                'password' => Hash::make($dto->password),
            ]);        
        return $result == true ? true : false;
    }
}

