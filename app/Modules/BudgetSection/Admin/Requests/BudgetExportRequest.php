<?php

namespace App\Modules\BudgetSection\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetExportRequest extends FormRequest
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
            'variant' => 'required|integer',
        ];
    }   
}

