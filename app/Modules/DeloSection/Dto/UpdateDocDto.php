<?php

namespace App\Modules\DeloSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\DeloSection\Requests\UpdateDoc;

class UpdateDocDto extends BaseDto
{
    public int    $id;
    public int    $npa;
    public int    $corr;
    public string $content;
    public string $date;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param CommunalSendingRequest $request
     * @return static
     */
    public static function fromRequest(UpdateDoc $request): self
    {
        return new self([
            'id'      => $request->get('id'),
            'npa'     => $request->get('npa'),
            'corr'    => $request->get('corr'),
            'content' => $request->get('content'),
            'date'    => $request->get('date'),
        ]);
    }
}

