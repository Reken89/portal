<?php

namespace App\Modules\OfsSection\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SynchOfsRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'mounth'  => 'required|integer',
        ];
    }   
}

