<?php

namespace App\Modules\OfsSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Finish;

class FinishTask extends BaseTask
{      
    /**
     * Обновляем информацию в finishes
     *
     * @param int $id, string $value
     * @return bool
     */
    public function UpdateInfo(int $id, string $value): bool
    {    
        $result = Finish::find($id)
            ->update([                
                 'date' => $value
            ]);       
        return $result == true ? true : false;                   
    }
    
    /**
     * Получаем информацию из finishes
     *
     * @param int $id
     * @return array
     */
    public function SelectInfo(int $id): array 
    {     
        return Finish::select()  
            ->where('id', $id)
            ->first()
            ->toArray();            
    }

}