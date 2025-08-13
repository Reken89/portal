<?php

namespace App\Modules\DeloSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\DeloSection\Requests\AddCorr;

class AddCorrDto extends BaseDto
{
    public string $title;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param AddCorr $request
     * @return static
     */
    public static function fromRequest(AddCorr $request): self
    {
        return new self([
            'title' => $request->get('title'),
        ]);
    }
}

