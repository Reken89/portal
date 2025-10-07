<?php

namespace App\Modules\RoboSection\Ofs\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Coordinator;

class CoordinatorTask extends BaseTask
{          
    /**
     * Обновляем месяц
     *
     * @param int $mounth
     * @return 
     */
    public function UpdateMounth(int $mounth) 
    {     
        return Coordinator::where('mounth', '!=', $mounth) 
            ->update([
                'mounth' => $mounth,
                'date'   => date('Y-m-d'),
            ]); 
    }
}

