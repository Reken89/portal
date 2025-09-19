<?php

namespace App\Modules\AdminSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\AdminSection\Requests\UpdatePasswordRequest;

class UpdatePasswordDto extends BaseDto
{
    public int      $id;
    public string   $password;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdatePasswordRequest $request
     * @return static
     */
    public static function fromRequest(UpdatePasswordRequest $request): self
    {
        return new self([
            'id'       => $request->get('id'),
            'password' => $request->get('password'),
        ]);
    }
}
