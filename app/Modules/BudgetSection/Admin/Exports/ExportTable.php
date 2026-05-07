<?php

namespace App\Modules\BudgetSection\Admin\Exports;

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
        
        if($info['export'] == 2026){
            return view('budget.admin.export26', ['info' => $info]);
        }
        
        return view('budget.admin.export25', ['info' => $info]);
    }
}
