<?php

namespace App\Modules\BudgetSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\BudgetSection\Admin\Requests\BudgetExportRequest;

class BudgetExportDto extends BaseDto
{
    public int $year;
    public int $variant;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param BudgetExportRequest $request
     * @return static
     */
    public static function fromRequest(BudgetExportRequest $request): self
    {
        return new self([
            'year'    => $request->get('year'),
            'variant' => $request->get('variant'),
        ]);
    }
}



