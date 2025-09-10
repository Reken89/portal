<?php

namespace App\Modules\ArchiveSection\User\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\ArchiveSection\User\Requests\AddParametersRequest;

class AddParametersDto extends BaseDto
{
    public int   $user_id;
    public int   $year;
    public int   $mounth;
    public array $chapter;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param AddParametersRequest $request
     * @return static
     */
    public static function fromRequest(AddParametersRequest $request): self
    {
        return new self([
            'user_id' => $request->get('user_id'),
            'year'    => $request->get('year'),
            'mounth'  => $request->get('mounth'),
            'chapter' => $request->get('chapter'),
        ]);
    }
}

