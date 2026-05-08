<?php

namespace App\Modules\BudgetSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Modules\BudgetSection\Admin\Models\Budget26;
use App\Modules\BudgetSection\Admin\Dto\BudgetUpdateDto;

class BudgetUpdateTask extends BaseTask
{   
    /**
     * Обновляем информацию в таблице budget26
     *
     * @param BudgetUpdateDto $dto
     * @return bool
     */
    public function updateInfo(BudgetUpdateDto $dto): bool
    {   
        try {
            return DB::transaction(function () use ($dto) {                
                //Получаем строку из budget26
                $line = Budget26::select('budget26.*')
                    ->where('budget26.id', $dto->id)
                    ->join('ekr', 'budget26.ekr_id', '=', 'ekr.id')  
                    ->with('ekr:id,number')     
                    ->first()
                    ->toArray();

                $number = $line['ekr']['number'];
                $old_sum = $line['data'][$dto->user_id]['sum_fu'];

                // Обновляем значение
                Budget26::where('id', $dto->id)->update([
                    "data->{$dto->user_id}->sum_fu"  => $dto->sum,
                    "data->{$dto->user_id}->date_fu" => date('Y-m-d'),
                ]);

                //Обновляем строку main
                Budget26::where('year', $dto->year) 
                    ->whereHas('ekr', function (Builder $query) use ($number) {
                        $query->where('shared', 'No');
                        $query->where('main', 'Yes');
                        $query->where('number', $number);
                    })    
                    ->update([
                        // Обновляем дату обычным способом
                        "data->{$dto->user_id}->date_fu" => date('Y-m-d'),

                        // Математика через DB::raw для JSON
                        "data" => DB::raw("JSON_SET(data, '$.\"{$dto->user_id}\".sum_fu', 
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(data, '$.\"{$dto->user_id}\".sum_fu')) AS DECIMAL(15,2)) 
                            - {$old_sum} 
                            + {$dto->sum}
                        )")
                    ]);

                //Обновляем строку share            
                if($number >= 17 && $number <=42 || $number == 45){
                    if ($number >= 17 && $number <= 19) {
                        $num = 16;
                    } elseif ($number >= 21 && $number <= 25) {
                        $num = 20;
                    } elseif ($number >= 27 && $number <= 34) {
                        $num = 26;
                    } elseif (($number >= 36 && $number <= 42) || $number == 45) {
                        $num = 35;
                    }

                    Budget26::where('year', $dto->year) 
                    ->whereHas('ekr', function (Builder $query) use ($num) {
                        $query->where('shared', 'Yes');
                        $query->where('main', 'Yes');
                        $query->where('number', $num);
                    })    
                    ->update([
                        // Обновляем дату обычным способом
                        "data->{$dto->user_id}->date_fu" => date('Y-m-d'),

                        // Математика через DB::raw для JSON
                        "data" => DB::raw("JSON_SET(data, '$.\"{$dto->user_id}\".sum_fu', 
                            CAST(JSON_UNQUOTE(JSON_EXTRACT(data, '$.\"{$dto->user_id}\".sum_fu')) AS DECIMAL(15,2)) 
                            - {$old_sum} 
                            + {$dto->sum}
                        )")
                    ]);           
                }  
                
                return true; 
            });
        }catch (\Exception $e) {
            // Если база ругнулась (например, деление на ноль или лок таблицы)
            \Log::error("Ошибка в UpdateInfo: " . $e->getMessage());
            return false;
        }    
    }
    
    /**
     * Синхронизируем года
     * 2029 и 2028 приравниваем к 2027
     *
     * @return bool
     */
    public function synchInfo(): bool
    { 
        $affected = DB::table('budget26 as target')
        ->join('budget26 as source', function ($join) {
            $join->on('target.ekr_id', '=', 'source.ekr_id')
                 ->where('source.year', 2027);
        })
        ->whereIn('target.year', [2028, 2029])
        ->update(['target.data' => DB::raw('source.data')]);

        return $affected > 0;        
    }
    
    /**
     * Обновляем таблицу budget26
     * Только значения коммунальных услуг
     *
     * @param int $ekr, int $user, float $sum
     * @return bool
     */
    public function updateCommunals(int $ekr, int $user, float $sum): bool
    { 
        $result = Budget26::where('ekr_id', $ekr)
            ->update([
                "data->{$user}->sum_fu"  => $sum,
                "data->{$user}->date_fu" => date('Y-m-d'),
            ]);
                
        return $result == true ? true : false;             
    }
}



