<?php

namespace App\Modules\ArchiveSection\Admin\Requests;

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
            'year'    => 'required|integer',
            'mounth'  => 'required|array',
            'chapter' => 'required|array',
            'user'    => 'required|array',
        ];
    }   
}

