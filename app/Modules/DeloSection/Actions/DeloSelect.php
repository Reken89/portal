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
        //Проверяем фильтры в сессии
        if (session('user_filter') == NULL || session('user_filter') == FALSE || session('user_filter') == "no"){
            $documents = $this->task(SelectDocuments::class)->SelectAll($variant);
        }else{
            $user_id = Auth::user()->id();
            $documents = $this->task(SelectDocuments::class)->SelectFilter($variant, $user_id);
        }
        
        return [
            'documents' => $documents,
            'npa'       => $this->task(SelectNpa::class)->SelectAll(),
            'corr'      => $this->task(SelectCorr::class)->SelectAll(),
            'email'     => Auth::user()->email(),
            'author'    => Auth::user()->name(),
            'user_id'   => Auth::user()->id(),
            'variant'   => $variant
        ];
    }
    
    /**
     * Получаем информацию
     * по корреспондентам
     *
     * @param
     * @return array
     */
    public function SelectCorr(): array
    {
        return [
            'corr'  => $this->task(SelectCorr::class)->SelectAll(),
            'email' => Auth::user()->email(),
            'role'  => Auth::user()->role(),
        ];       
    }
}

