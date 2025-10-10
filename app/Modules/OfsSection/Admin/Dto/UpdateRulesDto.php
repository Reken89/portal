<?php

namespace App\Modules\OfsSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\OfsSection\Admin\Requests\UpdateRulesRequest;

class UpdateRulesDto extends BaseDto
{
    public int      $finish;
    public string   $old;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateRulesRequest $request
     * @return static
     */
    public static function fromRequest(UpdateRulesRequest $request): self
    {
        return new self([
            'finish' => $request->get('finish'),
            'old'    => $request->get('old'),
        ]);
    }
}

