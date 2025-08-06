<?php

namespace App\Modules\DeloSection\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDoc extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'author'  => 'required|string',
            'variant' => 'required|string',
            'npa'     => 'required|integer',
            'corr'    => 'required|integer',
            'content' => 'required|string',
        ];
    }   
}

