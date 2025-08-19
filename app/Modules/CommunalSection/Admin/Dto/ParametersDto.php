<?php

namespace App\Modules\CommunalSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\CommunalSection\Admin\Requests\ParametersRequest;

class ParametersDto extends BaseDto
{
    public array $year;
    public array $mounth;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param ParametersRequest $request
     * @return static
     */
    public static function fromRequest(ParametersRequest $request): self
    {
        return new self([
            'year'   => $request->get('year'),
            'mounth' => $request->get('mounth'),
        ]);
    }
}

