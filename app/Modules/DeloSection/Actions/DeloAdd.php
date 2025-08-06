<?php

namespace App\Modules\DeloSection\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\DeloSection\Dto\AddDocDto;
use App\Modules\DeloSection\Tasks\AddDocuments;
use App\Modules\DeloSection\Tasks\SelectDocuments;

class DeloAdd extends BaseAction
{
    /**
     * Добавляем новое письмо
     *
     * @param AddDocDto $dto
     * @return bool
     */
    public function AddDoc(AddDocDto $dto): bool
    {
        $number = $this->task(SelectDocuments::class)->GetNumber($dto->variant);
        $result = $this->task(AddDocuments::class)->AddLine($dto, $number);
        return $result;
    }
}

