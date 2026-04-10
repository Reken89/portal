<?php

namespace App\Modules\Ofs26Section\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetOfsRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'      => 'required|string',
            'chapter' => 'required|string',
            'mounth'  => 'required|string',
            'user_id' => 'required|string',
            'ekr_id'  => 'required|string',
            'number'  => 'required|string',
        ];
    }   
}
