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
    
    /**
     * Выбираем месяца
     *
     * @param int $mounth
     * @return 
     */
    public function SelectMounth(int $mounth) 
    {     
        return Coordinator::select()  
            ->where('mounth', '!=', $mounth) 
            ->get()
            ->toArray();         
    }
    
    /**
     * Получаем минимальный месяц месяц
     *
     * @param
     * @return 
     */
    public function MinMounth() 
    {     
        return Coordinator::select('mounth')  
            ->min('mounth');
    }
}

