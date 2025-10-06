<?php

namespace App\Modules\OfsSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Finish;

class FinishTask extends BaseTask
{      
    /**
     * Получаем информацию из finishes
     *
     * @param string $info
     * @return array
     */
    public function SelectInfo(string $info): array 
    {     
        return Finish::select()  
            ->where('title', $info)
            ->first()
            ->toArray();            
    }

}
