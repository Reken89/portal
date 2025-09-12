<?php

namespace App\Modules\ArchiveSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\ArchiveSection\Admin\Models\Parameter;

class SelectParametersTask extends BaseTask
{
    /**
     * Получаем список запросов
     *
     * @param 
     * @return array
     */
    public function SelectAll(): array
    {        
        return Parameter::select()   
            ->with(['user:id,name'])    
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
    }  
    
    /**
     * Получаем номер для нового запроса
     *
     * @param 
     * @return
     */
    public function GetNumber()
    {
        $result = Parameter::select()        
            ->orderBy('id', 'desc')    
            ->first()
            ->toArray();
        return $result['number']+1;
    }
    
    /**
     * Получаем запрос по id
     *
     * @param int $id
     * @return array
     */
    public function SelectLine(int $id): array
    {
        return Parameter::select()   
            ->where('id', $id)    
            ->first()
            ->toArray();
    }
}

