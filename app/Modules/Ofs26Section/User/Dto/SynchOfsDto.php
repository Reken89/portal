<?php

namespace App\Modules\Ofs26Section\User\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\Ofs26Section\User\Requests\SynchOfsRequest;

class SynchOfsDto extends BaseDto
{
    public int $user_id;
    public array $chapter;
    public int $mounth;

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
            'chapter' => $request->get('chapter'),
            'mounth'  => $request->get('mounth'),
        ]);
    }
}

