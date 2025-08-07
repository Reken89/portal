<?php

namespace App\Modules\DeloSection\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\DeloSection\Dto\UpdateStatusDto;
use App\Modules\DeloSection\Dto\UpdateDocDto;
use App\Modules\DeloSection\Tasks\UpdateDocuments;

class DeloUpdate extends BaseAction
{
    /**
     * Обновляем статус письма
     *
     * @param UpdateStatusDto $dto
     * @return bool
     */
    public function UpdateStatus(UpdateStatusDto $dto): bool
    {
        $result = $this->task(UpdateDocuments::class)->UpdateStatus($dto->id);
        return $result;
    }
    
    /**
     * Обновляем информацию в письме
     *
     * @param UpdateDocDto $dto
     * @return bool
     */
    public function UpdateDoc(UpdateDocDto $dto): bool
    {
        $result = $this->task(UpdateDocuments::class)->UpdateDoc($dto);
        return $result;
    }
}

