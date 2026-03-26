<?php

namespace App\Modules\Ofs26Section\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\Ofs26Section\Admin\Requests\ExportRequest;

class ExportDto extends BaseDto
{
    public array $month;
    public array $chapter;
    public array $user_id;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param AddParametersRequest $request
     * @return static
     */
    public static function fromRequest(ExportRequest $request): self
    {
        return new self([
            'month'   => $request->get('month'),
            'chapter' => $request->get('chapter'),
            'user_id' => $request->get('user_id'),
        ]);
    }
}
