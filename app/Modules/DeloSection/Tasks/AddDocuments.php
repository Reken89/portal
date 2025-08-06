<?php

namespace App\Modules\DeloSection\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\DeloSection\Dto\AddDocDto;
use App\Modules\DeloSection\Models\Document;

class AddDocuments extends BaseTask
{
    /**
     * Добавляем письмо
     *
     * @param AddDocDto $dto, int $number
     * @return bool
     */
    public function AddLine(AddDocDto $dto, int $number): bool
    {
        $result = Document::create([
            'number'           => $number,
            'npa_id'           => $dto->npa,
            'correspondent_id' => $dto->corr,
            'date'             => date('Y-m-d'),
            'user_id'          => $dto->user_id,
            'content'          => $dto->content,
            'author'           => $dto->author,
            'type'             => $dto->variant,
        ]);
        return $result == true ? true : false;
    }
}  

