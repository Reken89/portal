<?php

namespace App\Modules\DeloSection\Actions;

use App\Core\Actions\BaseAction;
use Illuminate\Support\Facades\Auth;
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
            'email'     => Auth::user()->email(),
            'variant'   => $variant
        ];
    }
}

