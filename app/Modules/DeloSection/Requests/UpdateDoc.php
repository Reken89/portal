<?php

namespace App\Modules\DeloSection\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoc extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'      => 'required|integer',
            'npa'     => 'required|integer',
            'corr'    => 'required|integer',
            'content' => 'required|string',
            'date'    => 'required|string',
        ];
    }   
}

