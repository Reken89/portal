<?php

namespace App\Modules\DeloSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\DeloSection\Requests\UpdateStatus;

class UpdateStatusDto extends BaseDto
{
    public int $id;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateStatus $request
     * @return static
     */
    public static function fromRequest(UpdateStatus $request): self
    {
        return new self([
            'id' => $request->get('id'),
        ]);
    }
}