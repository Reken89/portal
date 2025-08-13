<?php

namespace App\Modules\DeloSection\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\DeloSection\Dto\AddCorrDto;
use App\Modules\DeloSection\Tasks\AddCorrespondent;

class CorrAdd extends BaseAction
{
    /**
     * Добавляем корреспондента
     *
     * @param AddCorrDto $dto
     * @return bool
     */
    public function AddCorr(AddCorrDto $dto): bool
    {
        $result = $this->task(AddCorrespondent::class)->AddLine($dto);
        return $result;
    }
}

