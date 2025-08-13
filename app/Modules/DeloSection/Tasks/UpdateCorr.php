<?php

namespace App\Modules\DeloSection\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\DeloSection\Models\Correspondent;
use App\Modules\DeloSection\Dto\UpdateCorrDto;

class UpdateCorr extends BaseTask
{
    /**
     * Обновляем статус письма
     *
     * @param int $id
     * @return bool
     */
    public function UpdateStatus(int $id): bool
    {
        $result = Correspondent::find($id)
            ->update([                
                 'status' => 20
            ]);       
        return $result == true ? true : false;
    }
    
    /**
     * Редактируем корреспондента
     *
     * @param UpdateCorrDto $dto
     * @return bool
     */
    public function UpdateTitleCorr(UpdateCorrDto $dto): bool
    {
        $result = Correspondent::find($dto->id)
            ->update([                
                'status' => 10,
                'title'  => $dto->title,
            ]);       
        return $result == true ? true : false;
    }
} 

