<?php

namespace App\Modules\BudgetSection\Admin\Actions;

use App\Core\Actions\BaseAction;

class CalculateInfoAction extends BaseAction
{      
    /**
     * Считаем итоговые строки
     *
     * @param array $info
     * @return array
     */
    public function selectTotal(array $info): array
    {   
        $total = [];

        foreach ($info as $item) {
            // Условие фильтрации
            if ($item['ekr']['main'] === 'No' && $item['ekr']['shared'] === 'No') {

                foreach ($item['data'] as $key => $values) {
                    // Если ключа в итоговом массиве еще нет, просто кладем первый массив
                    if (!isset($total[$key])) {
                        $total[$key] = [
                            'sum_fu' => (float)$values['sum_fu'],
                            'sum_cb' => (float)$values['sum_cb']
                        ];
                        continue;
                    }

                    // Если ключ уже есть — плюсуем
                    $total[$key]['sum_fu'] += (float)$values['sum_fu'];
                    $total[$key]['sum_cb'] += (float)$values['sum_cb'];
                }
            }
        }

        return $total;
    }   
}




