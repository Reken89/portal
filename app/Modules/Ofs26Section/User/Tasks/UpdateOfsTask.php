<?php

namespace App\Modules\Ofs26Section\User\Tasks;

use App\Core\Tasks\BaseTask;
use Illuminate\Support\Facades\DB;
use App\Modules\Ofs26Section\User\Dto\UpdateOfsDto;
use App\Modules\Ofs26Section\User\Dto\SynchOfsDto;
use App\Modules\Ofs26Section\User\Dto\ResetOfsDto;

class UpdateOfsTask extends BaseTask
{   
    /**
     * Обновляем информацию в таблице ofs26
     *
     * @param UpdateOfsDto $dto
     * @return bool
     */
    public function UpdateInfo(UpdateOfsDto $dto): bool
    {   
        try {
            return DB::transaction(function () use ($dto) {
                // 1. Обновляем значения по id
                DB::table('ofs26')->where('id', $dto->id)->update([
                    'fact_all' => DB::raw("CASE WHEN fact_mounth != {$dto->fact_mounth} THEN fact_all + {$dto->fact_mounth} ELSE fact_all END"),
                    'kassa_all' => DB::raw("CASE WHEN kassa_mounth != {$dto->kassa_mounth} THEN kassa_all + {$dto->kassa_mounth} ELSE kassa_all END"),
                    'lbo'              => $dto->lbo,
                    'prepaid'          => $dto->prepaid,
                    'credit_year_all'  => $dto->credit_year_all,
                    'credit_year_term' => $dto->credit_year_term,
                    'debit_year_all'   => $dto->debit_year_all,
                    'debit_year_term'  => $dto->debit_year_term,
                    'fact_mounth'      => $dto->fact_mounth,
                    'kassa_mounth'     => $dto->kassa_mounth,
                    'credit_end_all'   => $dto->credit_end_all,
                    'credit_end_term'  => $dto->credit_end_term,
                    'debit_end_all'    => $dto->debit_end_all,
                    'debit_end_term'   => $dto->debit_end_term,
                    'return_old_year'  => $dto->return_old_year,
                ]);

                //Получаем значения для обновления main группы    
                $result = (array) DB::table('ofs26')
                ->join('ekr', 'ofs26.ekr_id', '=', 'ekr.id') 
                ->selectRaw('
                    SUM(ofs26.lbo) as lbo,
                    SUM(ofs26.prepaid) as prepaid,
                    SUM(ofs26.credit_year_all) as credit_year_all,
                    SUM(ofs26.credit_year_term) as credit_year_term,
                    SUM(ofs26.debit_year_all) as debit_year_all,
                    SUM(ofs26.debit_year_term) as debit_year_term,
                    SUM(ofs26.fact_all) as fact_all,
                    SUM(ofs26.fact_mounth) as fact_mounth,
                    SUM(ofs26.kassa_all) as kassa_all,
                    SUM(ofs26.kassa_mounth) as kassa_mounth,
                    SUM(ofs26.credit_end_all) as credit_end_all,
                    SUM(ofs26.credit_end_term) as credit_end_term,
                    SUM(ofs26.debit_end_all) as debit_end_all,
                    SUM(ofs26.debit_end_term) as debit_end_term,
                    SUM(ofs26.return_old_year) as return_old_year
                ')
                ->where('ofs26.user_id', $dto->user_id)
                ->where('ofs26.mounth', $dto->mounth)
                ->where('ofs26.chapter', $dto->chapter)
                ->where('ekr.shared', 'No')
                ->where('ekr.main', 'No')
                ->where('ekr.number', $dto->number)
                ->first();
                $main = (array) $result;    

                //Обновляем main группу
                DB::table('ofs26')
                ->join('ekr', 'ofs26.ekr_id', '=', 'ekr.id') 
                ->where('ofs26.user_id', $dto->user_id)
                ->where('ofs26.mounth', $dto->mounth)
                ->where('ofs26.chapter', $dto->chapter)
                ->where('ekr.shared', 'No')
                ->where('ekr.main', 'Yes')
                ->where('ekr.number', $dto->number)
                ->limit(1)
                ->update([                
                    'ofs26.lbo'              => $main['lbo'],
                    'ofs26.prepaid'          => $main['prepaid'],
                    'ofs26.credit_year_all'  => $main['credit_year_all'],
                    'ofs26.credit_year_term' => $main['credit_year_term'],
                    'ofs26.debit_year_all'   => $main['debit_year_all'],
                    'ofs26.debit_year_term'  => $main['debit_year_term'],
                    'ofs26.fact_all'         => $main['fact_all'],
                    'ofs26.fact_mounth'      => $main['fact_mounth'],
                    'ofs26.kassa_all'        => $main['kassa_all'],
                    'ofs26.kassa_mounth'     => $main['kassa_mounth'],
                    'ofs26.credit_end_all'   => $main['credit_end_all'],
                    'ofs26.credit_end_term'  => $main['credit_end_term'],
                    'ofs26.debit_end_all'    => $main['debit_end_all'],
                    'ofs26.debit_end_term'   => $main['debit_end_term'],
                    'ofs26.return_old_year'  => $main['return_old_year'],
                ]);

                if($dto->number >= 17 && $dto->number <=42 || $dto->number == 45){
                    if ($dto->number >= 17 && $dto->number <= 19) {
                        $num = range(17, 19);
                        $n = 16;
                    } elseif ($dto->number >= 21 && $dto->number <= 25) {
                        $num = range(21, 25);
                        $n = 20;
                    } elseif ($dto->number >= 27 && $dto->number <= 34) {
                        $num = range(27, 32);
                        $n = 26;
                    } elseif (($dto->number >= 36 && $dto->number <= 42) || $dto->number == 45) {
                        $num = [...range(36, 42), 45];
                        $n = 35;
                    }

                    //Получаем значения для обновления shared группы    
                    $result = (array) DB::table('ofs26')
                    ->join('ekr', 'ofs26.ekr_id', '=', 'ekr.id') 
                    ->selectRaw('
                        SUM(ofs26.lbo) as lbo,
                        SUM(ofs26.prepaid) as prepaid,
                        SUM(ofs26.credit_year_all) as credit_year_all,
                        SUM(ofs26.credit_year_term) as credit_year_term,
                        SUM(ofs26.debit_year_all) as debit_year_all,
                        SUM(ofs26.debit_year_term) as debit_year_term,
                        SUM(ofs26.fact_all) as fact_all,
                        SUM(ofs26.fact_mounth) as fact_mounth,
                        SUM(ofs26.kassa_all) as kassa_all,
                        SUM(ofs26.kassa_mounth) as kassa_mounth,
                        SUM(ofs26.credit_end_all) as credit_end_all,
                        SUM(ofs26.credit_end_term) as credit_end_term,
                        SUM(ofs26.debit_end_all) as debit_end_all,
                        SUM(ofs26.debit_end_term) as debit_end_term,
                        SUM(ofs26.return_old_year) as return_old_year
                    ')
                    ->where('ofs26.user_id', $dto->user_id)
                    ->where('ofs26.mounth', $dto->mounth)
                    ->where('ofs26.chapter', $dto->chapter)
                    ->where('ekr.shared', 'No')
                    ->where('ekr.main', 'Yes')
                    ->whereIn('ekr.number', $num)
                    ->first();
                    $shared = (array) $result;  

                    //Обновляем shared группу
                    DB::table('ofs26')
                    ->join('ekr', 'ofs26.ekr_id', '=', 'ekr.id') 
                    ->where('ofs26.user_id', $dto->user_id)
                    ->where('ofs26.mounth', $dto->mounth)
                    ->where('ofs26.chapter', $dto->chapter)
                    ->where('ekr.shared', 'Yes')
                    ->where('ekr.main', 'Yes')
                    ->where('ekr.number', $n)
                    ->limit(1)
                    ->update([                
                        'ofs26.lbo'              => $shared['lbo'],
                        'ofs26.prepaid'          => $shared['prepaid'],
                        'ofs26.credit_year_all'  => $shared['credit_year_all'],
                        'ofs26.credit_year_term' => $shared['credit_year_term'],
                        'ofs26.debit_year_all'   => $shared['debit_year_all'],
                        'ofs26.debit_year_term'  => $shared['debit_year_term'],
                        'ofs26.fact_all'         => $shared['fact_all'],
                        'ofs26.fact_mounth'      => $shared['fact_mounth'],
                        'ofs26.kassa_all'        => $shared['kassa_all'],
                        'ofs26.kassa_mounth'     => $shared['kassa_mounth'],
                        'ofs26.credit_end_all'   => $shared['credit_end_all'],
                        'ofs26.credit_end_term'  => $shared['credit_end_term'],
                        'ofs26.debit_end_all'    => $shared['debit_end_all'],
                        'ofs26.debit_end_term'   => $shared['debit_end_term'],
                        'ofs26.return_old_year'  => $shared['return_old_year'],
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
     * Меняем статус
     *
     * @param SynchOfsDto $dto
     * @return bool
     */
    public function UpdateStatus(SynchOfsDto $dto)
    { 
        return (bool) DB::table('ofs26')
        ->where('user_id', $dto->user_id)
        ->where('mounth', $dto->mounth)
        ->where('status', '!=', 1)
        ->update([                
            'status' => 1,
        ]);       
    }    
    
    /**
     * Сброс значений
     *
     * @param ResetOfsDto $dto
     * @return bool
     */
    public function resetInfo(ResetOfsDto $dto): bool
    { 
        try {
            return DB::transaction(function () use ($dto) {
                // Если январь, то факт за всё время равен 0, так как прошлого месяца нет
                if ($dto->mounth == 1) {
                    $factAll = 0;
                    $kassaAll = 0;
                } else {
                    // Ищем данные за прошлый месяц
                    $result = DB::table('ofs26')
                        ->select('fact_all', 'kassa_all')
                        ->where('user_id', $dto->user_id)
                        ->where('ekr_id', $dto->ekr_id)
                        ->where('mounth', $dto->mounth - 1)
                        ->where('chapter', $dto->chapter)
                        ->first();

                    if (!$result) return false;

                    $factAll = $result->fact_all;
                    $kassaAll = $result->kassa_all;
                }

                // Обновляем текущую запись
                DB::table('ofs26')->where('id', $dto->id)->update([
                    'fact_all'     => $factAll,
                    'kassa_all'    => $kassaAll,
                    'fact_mounth'  => 0,
                    'kassa_mounth' => 0,
                ]);
                return true; 
            });            
        } catch (Exception $ex) {
            // Если база ругнулась (например, деление на ноль или лок таблицы)
            \Log::error("Ошибка в UpdateInfo: " . $ex->getMessage());
            return false;
        }    
    } 
}



