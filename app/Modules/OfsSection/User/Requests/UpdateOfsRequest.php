<?php

namespace App\Modules\OfsSection\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfsRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'ekr_id'               => 'required|integer',
            'user_id'              => 'required|integer',
            'mounth'               => 'required|integer',
            'chapter'              => 'required|integer',
            'number'               => 'required|integer',
            'lbo'                  => 'required|numeric|between:0.000,999999999.999',
            'prepaid'              => 'required|numeric|between:0.000,999999999.999',
            'credit_year_all'      => 'required|numeric|between:0.000,999999999.999',
            'credit_year_term'     => 'required|numeric|between:0.000,999999999.999',
            'debit_year_all'       => 'required|numeric|between:0.000,999999999.999',
            'debit_year_term'      => 'required|numeric|between:0.000,999999999.999',
            'fact_mounth'          => 'required|numeric|between:-999999999.999,999999999.999',
            'kassa_mounth'         => 'required|numeric|between:-999999999.999,999999999.999',
            'credit_end_all'       => 'required|numeric|between:0.000,999999999.999',
            'credit_end_term'      => 'required|numeric|between:0.000,999999999.999',
            'debit_end_all'        => 'required|numeric|between:0.000,999999999.999',
            'debit_end_term'       => 'required|numeric|between:0.000,999999999.999',
            'return_old_year'      => 'required|numeric|between:0.000,999999999.999',
            'shared_id'            => 'required|integer',
            'main_id'              => 'required|integer',
            'id'                   => 'required|integer',
            'lbo_old'              => 'required|numeric|between:0.000,999999999.999',
            'prepaid_old'          => 'required|numeric|between:0.000,999999999.999',
            'credit_year_all_old'  => 'required|numeric|between:0.000,999999999.999',
            'credit_year_term_old' => 'required|numeric|between:0.000,999999999.999',
            'debit_year_all_old'   => 'required|numeric|between:0.000,999999999.999',
            'debit_year_term_old'  => 'required|numeric|between:0.000,999999999.999',
            'fact_mounth_old'      => 'required|numeric|between:-999999999.999,999999999.999',
            'kassa_mounth_old'     => 'required|numeric|between:-999999999.999,999999999.999',
            'credit_end_all_old'   => 'required|numeric|between:0.000,999999999.999',
            'credit_end_term_old'  => 'required|numeric|between:0.000,999999999.999',
            'debit_end_all_old'    => 'required|numeric|between:0.000,999999999.999',
            'debit_end_term_old'   => 'required|numeric|between:0.000,999999999.999',
            'return_old_year_old'  => 'required|numeric|between:0.000,999999999.999',
        ];
    }   
}

