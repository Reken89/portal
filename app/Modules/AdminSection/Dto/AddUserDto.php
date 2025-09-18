<?php

namespace App\Modules\AdminSection\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\AdminSection\Requests\AddUserRequest;

class AddUserDto extends BaseDto
{
    public string $name;
    public string $email;
    public string $role;
    public string $password;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param AddUserRequest $request
     * @return static
     */
    public static function fromRequest(AddUserRequest $request): self
    {
        return new self([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'role'     => $request->get('role'),
            'password' => $request->get('password'),
        ]);
    }
}

