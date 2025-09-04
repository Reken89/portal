<?php

namespace App\Modules\UtilitiesSection\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUtilitiesRequest extends FormRequest
{
        /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
        ];
    }   
}

