<?php

namespace App\Modules\UtilitiesSection\User\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\UtilitiesSection\User\Requests\UpdateUtilitiesRequest;

class UpdateUtilitiesDto extends BaseDto
{
    public int    $id;
    public float  $mb_volume;
    public float  $pd_volume;
    public float  $mb_sum;
    public float  $pd_sum;
    public string $type;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateUtilitiesRequest $request
     * @return static
     */
    public static function fromRequest(UpdateUtilitiesRequest $request): self
    {
        return new self([
            'id'        => $request->get('id'),
            'mb_volume' => $request->get('mb_volume'),
            'pd_volume' => $request->get('pd_volume'),
            'mb_sum'    => $request->get('mb_sum'),
            'pd_sum'    => $request->get('pd_sum'),
            'type'      => $request->get('type'),
        ]);
    }
}

