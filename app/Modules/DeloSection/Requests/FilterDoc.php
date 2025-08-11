<?php

namespace App\Modules\DeloSection\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterDoc extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_filter' => 'required|string',
        ];
    }   
}

