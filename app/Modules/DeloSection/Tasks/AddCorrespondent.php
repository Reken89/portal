<?php

namespace App\Modules\DeloSection\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\DeloSection\Dto\AddCorrDto;
use App\Modules\DeloSection\Models\Correspondent;

class AddCorrespondent extends BaseTask
{
    /**
     * Добавляем корреспондента
     *
     * @param AddCorrDto $dto
     * @return bool
     */
    public function AddLine(AddCorrDto $dto): bool
    {
        $result = Correspondent::create([
            'title'  => $dto->title,
            'status' => 10,
        ]);
        return $result == true ? true : false;
    }
}  
