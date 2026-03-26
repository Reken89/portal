<?php

namespace App\Modules\Ofs26Section\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfsStatusRequest extends FormRequest
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
            'month'   => 'required|integer',
        ];
    }   
}
