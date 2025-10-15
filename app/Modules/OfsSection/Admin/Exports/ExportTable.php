<?php

namespace App\Modules\OfsSection\Admin\Exports;

// Для вывода с использованием Blade
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
  
class ExportTable implements FromView
{    
     /**
     * Экспорт с использованием шаблонизатора Blade
     * 
     * @param CommunalIndexRequest $request
     * @return view
     */
    public function view(): View
    {
        $info = session('info');
        return view('ofs.admin.exports.table', ['info' => $info]);
    }
}
