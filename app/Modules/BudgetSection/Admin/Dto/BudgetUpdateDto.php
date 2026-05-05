<?php

namespace App\Modules\BudgetSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\BudgetSection\Admin\Requests\BudgetUpdateRequest;

class BudgetUpdateDto extends BaseDto
{
    public int   $id;
    public int   $user_id;
    public float $sum;
    public int   $year;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateRequest $request
     * @return static
     */
    public static function fromRequest(BudgetUpdateRequest $request): self
    {
        return new self([
            'id'      => $request->get('id'),
            'user_id' => $request->get('user_id'),
            'sum'     => $request->get('sum'),
            'year'    => $request->get('year'),
        ]);
    }
}


