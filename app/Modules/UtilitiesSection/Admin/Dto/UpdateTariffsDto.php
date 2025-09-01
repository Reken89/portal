<?php

namespace App\Modules\UtilitiesSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\UtilitiesSection\Admin\Requests\UpdateTariffsRequest;

class UpdateTariffsDto extends BaseDto
{
    public int   $id;
    public float $tarif_min;
    public float $tarif_max;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateTariffsRequest $request
     * @return static
     */
    public static function fromRequest(UpdateTariffsRequest $request): self
    {
        return new self([
            'id'        => $request->get('id'),
            'tarif_min' => $request->get('tarif_min'),
            'tarif_max' => $request->get('tarif_max'),
        ]);
    }
}
