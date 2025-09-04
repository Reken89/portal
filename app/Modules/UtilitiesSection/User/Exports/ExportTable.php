<?php

namespace App\Modules\UtilitiesSection\User\Exports;

// Для вывода с использованием Blade
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
  
class ExportTable implements FromView
{    
     /**
     * Экспорт с использованием шаблонизатора Blade
     * Выполняет экспорт за выбранный год и месяц
     *
     * @param CommunalIndexRequest $request
     * @return view
     */
    public function view(): View
    {
        $info = session('info');
        return view('utilities.user.exports.table', ['info' => $info]);
    }
}

