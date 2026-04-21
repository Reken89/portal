<?php

namespace App\Modules\ForecastSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\ForecastSection\Admin\Requests\UpdateTariffRequest;

class UpdateTariffDto extends BaseDto
{
    public int   $id;
    public float $tariff;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateTariffRequest $request
     * @return static
     */
    public static function fromRequest(UpdateTariffRequest $request): self
    {
        return new self([
            'id'     => $request->get('id'),
            'tariff' => $request->get('tariff'),
        ]);
    }
}