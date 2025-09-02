<?php

namespace App\Modules\UtilitiesSection\User\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\UtilitiesSection\User\Requests\UpdateStatusRequest;

class UpdateStatusDto extends BaseDto
{
    public int    $id;
    public int    $status;
    public int    $mounth;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateStatusRequest $request
     * @return static
     */
    public static function fromRequest(UpdateStatusRequest $request): self
    {
        return new self([
            'id'     => $request->get('id'),
            'status' => $request->get('status'),
            'mounth' => $request->get('mounth'),
        ]);
    }
}


