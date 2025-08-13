<?php

namespace App\Modules\DeloSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\DeloSection\Requests\AddNpa;

class AddNpaDto extends BaseDto
{
    public string $title;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param AddNpa $request
     * @return static
     */
    public static function fromRequest(AddNpa $request): self
    {
        return new self([
            'title' => $request->get('title'),
        ]);
    }
}