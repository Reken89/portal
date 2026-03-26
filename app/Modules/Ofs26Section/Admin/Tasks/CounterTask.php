<?php

namespace App\Modules\Ofs26Section\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\Ofs26Section\Admin\Models\Counter;

class CounterTask extends BaseTask
{      
    /**
     * Обновляем информацию в Counter
     *
     * @param int $id
     * @return bool
     */
    public function updateInfo(int $id): bool
    {    
        $result = Counter::find($id)
            ->update([                
                'point' => Counter::raw("point + 1"),
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
    public function selectInfo(int $id): array 
    {     
        return Counter::select()  
            ->where('id', $id)
            ->first()
            ->toArray();            
    }
}

