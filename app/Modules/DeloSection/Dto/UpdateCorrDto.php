<?php

namespace App\Modules\DeloSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\DeloSection\Requests\UpdateCorrDoc;

class UpdateCorrDto extends BaseDto
{
    public int    $id;
    public string $title;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateCorrDoc $request
     * @return static
     */
    public static function fromRequest(UpdateCorrDoc $request): self
    {
        return new self([
            'id'    => $request->get('id'),
            'title' => $request->get('title'),
        ]);
    }
}

