<?php

namespace App\Modules\ArchiveSection\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddParametersRequest extends FormRequest
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
            'year'    => 'required|integer',
            'mounth'  => 'required|integer',
            'chapter' => 'required|array',
        ];
    }   
}

