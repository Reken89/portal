<?php

namespace App\Modules\Ofs26Section\Admin\Exports;

// Для вывода с использованием Blade
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
  
class ExportTable implements FromView
{    
    // 1. Объявляем свойство для хранения данных
    private $tableData;

    // 2. Передаем данные при создании объекта
    public function __construct($data)
    {
        $this->tableData = $data;
    }
     /**
     * Экспорт с использованием шаблонизатора Blade
     * 
     * @param CommunalIndexRequest $request
     * @return view
     */
    public function view(): View
    {
        $info = $this->tableData;
        return view('ofs26.admin.export', ['info' => $info]);
    }
}
