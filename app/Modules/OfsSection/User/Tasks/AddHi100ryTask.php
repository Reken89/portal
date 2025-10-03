<?php

namespace App\Modules\OfsSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\OfsSection\Admin\Models\Hi100ry;
use App\Modules\OfsSection\User\Dto\SynchOfsDto;

class AddHi100ryTask extends BaseTask
{      
    /**
     * Добавляем информацию в HI100RY
     *
     * @param SynchOfsDto $dto
     * @return bool
     */
    public function AddHi100ry(SynchOfsDto $dto): bool
    {     
        $result = Hi100ry::create([
            'user_id' => $dto->user_id,
            'year'    => date('Y'),
            'mounth'  => $dto->mounth,
            'date'    => date('Y-m-d'),
        ]);
        return $result == true ? true : false;             
    }
}

