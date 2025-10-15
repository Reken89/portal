<?php

namespace App\Modules\OfsSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Counter;

class CounterTask extends BaseTask
{      
    /**
     * Обновляем информацию в Counter
     *
     * @param int $id
     * @return bool
     */
    public function UpdateInfo(int $id): bool
    {    
        $result = Counter::find($id)
            ->update([                
                'point' => ofs::raw("point + 1"),
                'date'  => date('Y-m-d'),
            ]);       
        return $result == true ? true : false;                   
    }
    
    /**
     * Получаем информацию из Counter
     *
     * @param int $id
     * @return array
     */
    public function SelectInfo(int $id): array 
    {     
        return Counter::select()  
            ->where('id', $id)
            ->first()
            ->toArray();            
    }

}