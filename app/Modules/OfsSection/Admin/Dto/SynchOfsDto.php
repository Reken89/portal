<?php

namespace App\Modules\OfsSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\OfsSection\Admin\Requests\SynchOfsRequest;

class SynchOfsDto extends BaseDto
{
    public int      $user_id;
    public int      $mounth;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param SynchOfsRequest $request
     * @return static
     */
    public static function fromRequest(SynchOfsRequest $request): self
    {
        return new self([
            'user_id' => $request->get('user_id'),
            'mounth'  => $request->get('mounth'),
        ]);
    }
}