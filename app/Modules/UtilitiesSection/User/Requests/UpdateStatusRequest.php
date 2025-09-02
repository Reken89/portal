<?php

namespace App\Modules\UtilitiesSection\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
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
            'status' => 'required|integer',
            'mounth' => 'required|integer',
        ];
    }   
}
