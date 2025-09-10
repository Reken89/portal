<?php

namespace App\Modules\ArchiveSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\ArchiveSection\Admin\Models\Parameter;
use App\Modules\ArchiveSection\User\Dto\AddParametersDto;

class AddParametersTask extends BaseTask
{
    /**
     * Добавление параметров
     * для запроса
     *
     * @param UpdateTariffsDto $dto, $number
     * @return bool
     */
    public function AddParameters(AddParametersDto $dto, int $number): bool
    {        
        $result = Parameter::create([
            'user_id' => $dto->user_id,
            'year'    => $dto->year,
            'mounth'  => $dto->mounth,
            'chapter' => json_encode($dto->chapter),
            'number'  => $number,
            'date'    => date('Y-m-d'),
        ]); 
        return $result == true ? true : false;
    }  
}

