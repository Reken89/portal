<?php

namespace App\Modules\OfsSection\User\Dto;

use App\Core\Dto\BaseDto;
use App\Modules\OfsSection\User\Requests\UpdateOfsRequest;

class UpdateOfsDto extends BaseDto
{
    public int      $ekr_id;
    public int      $user_id;
    public int      $mounth;
    public int      $chapter;
    public int      $number;
    public float    $lbo;
    public float    $prepaid;
    public float    $credit_year_all;
    public float    $credit_year_term;
    public float    $debit_year_all;
    public float    $debit_year_term;
    public float    $fact_mounth;
    public float    $kassa_mounth;
    public float    $credit_end_all;
    public float    $credit_end_term;
    public float    $debit_end_all;
    public float    $debit_end_term;
    public float    $return_old_year;
    public int      $shared_id;
    public int      $main_id;
    public int      $id;
    public float    $lbo_old;
    public float    $prepaid_old;
    public float    $credit_year_all_old;
    public float    $credit_year_term_old;
    public float    $debit_year_all_old;
    public float    $debit_year_term_old;
    public float    $fact_mounth_old;
    public float    $kassa_mounth_old;
    public float    $credit_end_all_old;
    public float    $credit_end_term_old;
    public float    $debit_end_all_old;
    public float    $debit_end_term_old;
    public float    $return_old_year_old;

    /**
     * Возвращает DTO из объекта Request
     *
     * @param UpdateOfsRequest $request
     * @return static
     */
    public static function fromRequest(UpdateOfsRequest $request): self
    {
        return new self([
            'ekr_id'               => $request->get('ekr_id'),
            'user_id'              => $request->get('user_id'),
            'mounth'               => $request->get('mounth'),
            'chapter'              => $request->get('chapter'),
            'number'               => $request->get('number'),
            'lbo'                  => $request->get('lbo'),
            'prepaid'              => $request->get('prepaid'),
            'credit_year_all'      => $request->get('credit_year_all'),
            'credit_year_term'     => $request->get('credit_year_term'),
            'debit_year_all'       => $request->get('debit_year_all'),
            'debit_year_term'      => $request->get('debit_year_term'),
            'fact_mounth'          => $request->get('fact_mounth'),
            'kassa_mounth'         => $request->get('kassa_mounth'),
            'credit_end_all'       => $request->get('credit_end_all'),
            'credit_end_term'      => $request->get('credit_end_term'),
            'debit_end_all'        => $request->get('debit_end_all'),
            'debit_end_term'       => $request->get('debit_end_term'),
            'return_old_year'      => $request->get('return_old_year'),
            'shared_id'            => $request->get('shared_id'),
            'main_id'              => $request->get('main_id'),
            'id'                   => $request->get('id'),
            'lbo_old'              => $request->get('lbo_old'),
            'prepaid_old'          => $request->get('prepaid_old'),
            'credit_year_all_old'  => $request->get('credit_year_all_old'),
            'credit_year_term_old' => $request->get('credit_year_term_old'),
            'debit_year_all_old'   => $request->get('debit_year_all_old'),
            'debit_year_term_old'  => $request->get('debit_year_term_old'),
            'fact_mounth_old'      => $request->get('fact_mounth_old'),
            'kassa_mounth_old'     => $request->get('kassa_mounth_old'),
            'credit_end_all_old'   => $request->get('credit_end_all_old'),
            'credit_end_term_old'  => $request->get('credit_end_term_old'),
            'debit_end_all_old'    => $request->get('debit_end_all_old'),
            'debit_end_term_old'   => $request->get('debit_end_term_old'),
            'return_old_year_old'  => $request->get('return_old_year_old'),
        ]);
    }
}
