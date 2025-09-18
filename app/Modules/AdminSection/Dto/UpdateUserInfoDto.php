<?php

namespace App\Modules\AdminSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\AdminSection\Requests\UpdateUserInfoRequest;

class UpdateUserInfoDto extends BaseDto
{
    public string   $id;
    public string   $name;
    public string   $email;
    public string   $role;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateUserInfoRequest $request
     * @return static
     */
    public static function fromRequest(UpdateUserInfoRequest $request): self
    {
        return new self([
            'id'    => $request->get('id'),
            'name'  => $request->get('name'),
            'email' => $request->get('email'),
            'role'  => $request->get('role'),
        ]);
    }
}

