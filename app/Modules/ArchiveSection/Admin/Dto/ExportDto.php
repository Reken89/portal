<?php

namespace App\Modules\ArchiveSection\Admin\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\ArchiveSection\Admin\Requests\ExportRequest;

class ExportDto extends BaseDto
{
    public int   $year;
    public array $mounth;
    public array $chapter;
    public array $user;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param AddParametersRequest $request
     * @return static
     */
    public static function fromRequest(ExportRequest $request): self
    {
        return new self([
            'year'    => $request->get('year'),
            'mounth'  => $request->get('mounth'),
            'chapter' => $request->get('chapter'),
            'user'    => $request->get('user'),
        ]);
    }
}

