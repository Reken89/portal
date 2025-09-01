<?php

namespace App\Modules\UtilitiesSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\UtilitiesSection\Admin\Requests\SynchTariffsRequest;

class SynchTariffsDto extends BaseDto
{
    public int $year;
    public int $mounth;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param SynchTariffsRequest $request
     * @return static
     */
    public static function fromRequest(SynchTariffsRequest $request): self
    {
        return new self([
            'year'   => $request->get('year'),
            'mounth' => $request->get('mounth'),
        ]);
    }
}

