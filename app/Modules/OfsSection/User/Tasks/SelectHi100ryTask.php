<?php

namespace App\Modules\OfsSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Hi100ry;

class SelectHi100ryTask extends BaseTask
{      
    /**
     * Получаем информацию из HI100RY
     *
     * @param
     * @return array
     */
    public function SelectInfo(): array
    {     
        return Hi100ry::select()  
            ->with([
                'user:id,name',
            ])   
            ->orderBy('id', 'desc')   
            ->get()
            ->toArray();       
    }
}
