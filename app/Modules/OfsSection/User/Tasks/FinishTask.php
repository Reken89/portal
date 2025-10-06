<?php

namespace App\Modules\OfsSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Finish;

class FinishTask extends BaseTask
{      
    /**
     * Получаем информацию из finishes
     *
     * @param 
     * @return array
     */
    public function SelectInfo(): array 
    {     
        return Finish::select()  
            ->where('title', 'ofs')
            ->first()
            ->toArray();            
    }

}
