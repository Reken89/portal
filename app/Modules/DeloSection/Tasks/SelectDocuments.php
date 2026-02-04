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
    
    /**
     * Возвращает таблицу documents
     * Используя фильтр по пользователю
     *
     * @param string $variant, int $user_id
     * @return
     */
    public function SelectFilter(string $variant, int $user_id)
    {
        $result = Document::select()      
            ->with([
                'user:id,name',
                'npa',
                'correspondent'
                ]) 
            ->where('type', $variant)  
            ->where('user_id', $user_id)  
            ->limit(100)
            ->orderBy('id', 'desc')
            ->get()
            ->toArray();
        return $result;
    }
    
    /**
     * Получаем номер для нового письма
     *
     * @param string $variant
     * @return
     */
    public function GetNumber(string $variant)
    {
        $result = Document::select()      
            ->whereDate('date', '>', '2026-01-01') 
            ->where('type', $variant)     
            ->orderBy('id', 'desc')    
            ->first()
            ->toArray();
        return $result['number']+1;
    }
}    

