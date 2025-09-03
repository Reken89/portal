<?php

namespace App\Modules\UtilitiesSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\UtilitiesSection\Admin\Models\Point;

class PointsTask extends BaseTask
{   
    /**
     * Возвращает очки учреждения
     *
     * @param int $id
     * @return array
     */
    public function SelectPoints(int $id): array
    {        
        return Point::select()
            ->where('user_id', $id)    
            ->first()
            ->toArray();
    }
    
    /**
     * Обновляем очки учреждения
     *
     * @param int $id
     * @return bool
     */
    public function UpdatePoints(int $id): bool
    {        
        $result = Point::where('user_id', $id)   
            ->update([
                'points' => Point::raw("points + 10"),
                'mounth' => date("m"),
            ]);            
        return $result == true ? true : false;       
    }
}

