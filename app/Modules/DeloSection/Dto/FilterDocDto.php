<?php

namespace App\Modules\DeloSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\DeloSection\Requests\FilterDoc;

class FilterDocDto extends BaseDto
{
    public string $user_filter;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param FilterDoc $request
     * @return static
     */
    public static function fromRequest(FilterDoc $request): self
    {
        return new self([
            'user_filter' => $request->get('user_filter'),
        ]);
    }
}

