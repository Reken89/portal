<?php

namespace App\Modules\Ofs26Section\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'month'   => 'required|array',
            'chapter' => 'required|array',
            'user_id' => 'required|array',
        ];
    }   
}

