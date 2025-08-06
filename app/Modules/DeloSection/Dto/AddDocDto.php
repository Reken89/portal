<?php

namespace App\Modules\DeloSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\DeloSection\Requests\AddDoc;

class AddDocDto extends BaseDto
{
    public string $author;
    public string $variant;
    public int    $npa;
    public int    $corr;
    public string $content;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param CommunalSendingRequest $request
     * @return static
     */
    public static function fromRequest(AddDoc $request): self
    {
        return new self([
            'author'  => $request->get('author'),
            'variant' => $request->get('variant'),
            'npa'     => $request->get('npa'),
            'corr'    => $request->get('corr'),
            'content' => $request->get('content'),
        ]);
    }
}

