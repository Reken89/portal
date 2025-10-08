<?php

namespace App\Modules\RoboSection\Ofs\Tasks;

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
    
    /**
     * Обновляем информацию в finishes
     *
     * @param int $id, string $value
     * @return bool
     */
    public function UpdateInfo(int $id, string $value): bool 
    {     
        return Finish::find($id)
            ->update([                 
                'date' => $value,
            ]);                    
    }

}
