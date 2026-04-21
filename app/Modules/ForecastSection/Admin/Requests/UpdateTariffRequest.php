<?php

namespace App\Modules\ForecastSection\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTariffRequest extends FormRequest
{
        /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'     => 'required|integer',
            'tariff' => 'required|numeric',
        ];
    }   
}
