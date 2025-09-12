<?php

namespace App\Modules\ArchiveSection\User\Exports;

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
        return view('archive.ofs.user.exports.table', ['info' => $info]);
    }
}

