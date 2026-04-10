<?php

namespace App\Modules\Ofs26Section\User\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\Ofs26Section\User\Requests\ResetOfsRequest;

class ResetOfsDto extends BaseDto
{
    public int    $mounth;
    public int    $chapter;
    public int    $id;
    public int    $user_id;
    public int    $ekr_id;
    public int    $number;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param Ofs25ResetRequest $request
     * @return static
     */
    public static function fromRequest(ResetOfsRequest $request): self
    {
        return new self([
            'mounth'  => $request->get('mounth'),
            'chapter' => $request->get('chapter'),
            'id'      => $request->get('id'),
            'user_id' => $request->get('user_id'),
            'ekr_id'  => $request->get('ekr_id'),
            'number'  => $request->get('number'),
        ]);
    }
}

