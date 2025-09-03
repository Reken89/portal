<?php

namespace App\Modules\UtilitiesSection\User\Tasks;

use App\Core\Tasks\BaseTask;

class ExaminUtilitiesTask extends BaseTask
{   
    /**
     * Выполняем проверку значений таблицы utilities
     *
     * @param float $volume, float $sum, float $min, float $max
     * @return array
     */
    public function ExaminUtilities(float $volume, float $sum, float $min, float $max): bool
    {    
        if($volume == 0 && $sum !== 0.00){
            return false;
        }
        if($volume == 0 && $sum == 0){
            return true;
        }else{
            if($sum/$volume >= $min && $sum/$volume <= $max){
                return true;
            }else{
                return false;
            }
        }   
    }
}

