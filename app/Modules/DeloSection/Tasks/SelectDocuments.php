<?php

namespace App\Modules\DeloSection\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\DeloSection\Models\Document;

class SelectDocuments extends BaseTask
{
    /**
     * Возвращает таблицу documents
     *
     * @param string $variant
     * @return
     */
    public function SelectAll(string $variant)
    {
        $result = Document::select()      
            ->with([
                'user:id,name',
                'npa',
                'correspondent'
                ]) 
            ->where('type', $variant)  
            ->limit(100)
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
        return $result;
    }
}    

