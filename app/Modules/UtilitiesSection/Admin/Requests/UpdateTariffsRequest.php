<?php

namespace App\Modules\UtilitiesSection\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTariffsRequest extends FormRequest
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
            'tarif_min' => 'required|numeric',
            'tarif_max' => 'required|numeric',
        ];
    }   
}

