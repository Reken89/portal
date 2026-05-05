<?php

namespace App\Modules\BudgetSection\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetUpdateRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id'      => 'required|integer',
            'user_id' => 'required|integer',
            'sum'     => 'required|numeric|between:0.00,999999999.99',
        ];
    }   
}
