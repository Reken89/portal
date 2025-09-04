<?php

namespace App\Modules\UtilitiesSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\UtilitiesSection\Admin\Requests\UpdateUtilitiesRequest;

class UpdateUtilitiesDto extends BaseDto
{
    public int $id;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateUtilitiesRequest $request
     * @return static
     */
    public static function fromRequest(UpdateUtilitiesRequest $request): self
    {
        return new self([
            'id' => $request->get('id'),
        ]);
    }
}

