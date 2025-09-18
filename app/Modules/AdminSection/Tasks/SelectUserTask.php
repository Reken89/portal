<?php

namespace App\Modules\AdminSection\Tasks;

use App\Core\Tasks\BaseTask;
use App\Models\User;

class SelectUserTask extends BaseTask
{   
    /**
     * Получаем список пользователей
     *
     * @param 
     * @return array
     */
    public function SelectUsers(): array
    {    
        $info = User::select()
            ->get() 
            ->toArray();
        return $info; 
    }
}

