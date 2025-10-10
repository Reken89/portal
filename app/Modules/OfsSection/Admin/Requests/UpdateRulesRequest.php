<?php

namespace App\Modules\OfsSection\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRulesRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'finish' => 'required|integer',
            'old'    => 'required|string',
        ];
    }   
}
