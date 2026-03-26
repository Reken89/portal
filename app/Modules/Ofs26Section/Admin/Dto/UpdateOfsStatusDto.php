<?php

namespace App\Modules\Ofs26Section\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\Ofs26Section\Admin\Requests\UpdateOfsStatusRequest;

class UpdateOfsStatusDto extends BaseDto
{
    public int $user_id;
    public int $month;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateOfsStatusRequest $request
     * @return static
     */
    public static function fromRequest(UpdateOfsStatusRequest $request): self
    {
        return new self([
            'user_id' => $request->get('user_id'),
            'month'   => $request->get('month'),
        ]);
    }
}
