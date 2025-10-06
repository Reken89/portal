<?php

namespace App\Modules\OfsSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Coordinator;

class CoordinatorTask extends BaseTask
{      
    /**
     * Получаем месяц
     *
     * @param int $user_id
     * @return 
     */
    public function SelectMounth(int $user_id) 
    {     
        return Coordinator::select('mounth')  
            ->where('user_id', $user_id)
            ->max('mounth');
    }
    
    /**
     * Обновляем месяц
     *
     * @param int $user_id, int $mounth
     * @return 
     */
    public function UpdateMounth(int $user_id, int $mounth) 
    {     
        return Coordinator::where('user_id', $user_id)
            ->update([
                'mounth' => $mounth,
                'date'   => date('Y-m-d'),
            ]); 
    }
}
