<?php

namespace App\Modules\DeloSection\Actions;

use App\Core\Actions\BaseAction;
use Illuminate\Support\Facades\Auth;
use App\Modules\DeloSection\Tasks\SelectNpa;
use App\Modules\DeloSection\Tasks\SelectCorr;
use App\Modules\DeloSection\Tasks\SelectDocuments;

class DeloSelect extends BaseAction
{
    /**
     * Получаем всю информацию
     *
     * @param string $variant
     * @return
     */
    public function SelectAll(string $variant): array
    {   
        return [
            'documents' => $this->task(SelectDocuments::class)->SelectAll($variant),
            'npa'       => $this->task(SelectNpa::class)->SelectAll(),
            'corr'      => $this->task(SelectCorr::class)->SelectAll(),
            'email'     => Auth::user()->email(),
            'author'    => Auth::user()->name(),
            'variant'   => $variant
        ];
    }
}

