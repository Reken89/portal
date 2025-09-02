<?php

namespace App\Modules\UtilitiesSection\User\Requests;

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
            'id'        => 'required|integer',
            'mb_volume' => 'required|numeric|between:0.0000,999999.9999',
            'pd_volume' => 'required|numeric|between:0.0000,999999.9999',
            'mb_sum'    => 'required|numeric|between:0.00,9999999.99',
            'pd_sum'    => 'required|numeric|between:0.00,9999999.99',
            'type'      => 'required|string',
        ];
    }   
}

