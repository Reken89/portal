<?php

namespace App\Modules\AdminSection\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserInfoRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'    => 'required|integer',
            'name'  => 'required|string',
            'email' => 'required|string',
            'role'  => 'required|string',
        ];
    }   
}

