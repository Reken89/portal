<?php

namespace App\Modules\Ofs26Section\User\Requests;

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
            'chapter' => 'required|array',
            'mounth'  => 'required|integer',
        ];
    }   
}
