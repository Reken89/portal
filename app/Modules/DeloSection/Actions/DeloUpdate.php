<?php

namespace App\Modules\DeloSection\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\DeloSection\Dto\UpdateStatusDto;
use App\Modules\DeloSection\Dto\UpdateDocDto;
use App\Modules\DeloSection\Dto\UpdateCorrDto;
use App\Modules\DeloSection\Tasks\UpdateDocuments;
use App\Modules\DeloSection\Tasks\UpdateCorr;

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
     * Обновляем статус корреспондента
     * @param UpdateStatusDto $dto
     * @return bool
     */
    public function UpdateCorrStatus(UpdateStatusDto $dto): bool
    {
        $result = $this->task(UpdateCorr::class)->UpdateStatus($dto->id);
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
    
    /**
     * Обновляем информацию в корреспонденте
     *
     * @param UpdateCorrDto $dto
     * @return bool
     */
    public function UpdateCorr(UpdateCorrDto $dto): bool
    {
        $result = $this->task(UpdateCorr::class)->UpdateTitleCorr($dto);
        return $result;
    }
}

