<?php

namespace App\Modules\AdminSection\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'       => 'required|integer',
            'password' => 'required|string',
        ];
    }   
}

