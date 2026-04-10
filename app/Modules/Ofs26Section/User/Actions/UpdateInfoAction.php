<?php

namespace App\Modules\Ofs26Section\User\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\Ofs26Section\User\Dto\UpdateOfsDto;
use App\Modules\Ofs26Section\User\Dto\SynchOfsDto;
use App\Modules\Ofs26Section\User\Dto\ResetOfsDto;
use App\Modules\Ofs26Section\User\Tasks\UpdateOfsTask;
use App\Modules\Ofs26Section\User\Tasks\SynchOfsTask;
use Illuminate\Support\Facades\DB;

class UpdateInfoAction extends BaseAction
{   
    /**
     * Обновляем значения в ofs
     *
     * @param UpdateOfsDto $dto
     * @return 
     */
    public function UpdateOfs(UpdateOfsDto $dto): bool
    {   
        return $this->task(UpdateOfsTask::class)->UpdateInfo($dto);    
    }   
    
    /**
     * Синхронизация ОФС
     *
     * @param SynchOfsDto $dto
     * @return 
     */
    public function SynchOfs(SynchOfsDto $dto)
    {   
        $this->task(SynchOfsTask::class)->SynchInfo($dto);           
    } 
    
    /**
     * Обновляем статус
     *
     * @param SynchOfsDto $dto
     * @return 
     */
    public function updateStatus(SynchOfsDto $dto)
    {   
        return $this->task(UpdateOfsTask::class)->UpdateStatus($dto);           
    } 
    
    /**
     * Сброс значений
     *
     * @param ResetOfsDto $dto
     * @return 
     */
    public function resetInfo(ResetOfsDto $dto): bool
    {
        //Сброс строки по id
        $this->task(UpdateOfsTask::class)->resetInfo($dto); 
        
        //Поулчаем сброшенную строку по id
        $currentRow = DB::table('ofs26')->find($dto->id);
        $data = [
            'id'               => $currentRow->id,
            'user_id'          => $currentRow->user_id,
            'ekr_id'           => $currentRow->ekr_id,
            'mounth'           => $currentRow->mounth,
            'chapter'          => $currentRow->chapter,
            'number'           => $dto->number, 
            'lbo'              => $currentRow->lbo,
            'prepaid'          => $currentRow->prepaid,
            'credit_year_all'  => $currentRow->credit_year_all,
            'credit_year_term' => $currentRow->credit_year_term,
            'debit_year_all'   => $currentRow->debit_year_all,
            'debit_year_term'  => $currentRow->debit_year_term,
            'fact_mounth'      => $currentRow->fact_mounth, // Тут уже 0 после reset
            'kassa_mounth'     => $currentRow->kassa_mounth, // Тут уже 0 после reset
            'credit_end_all'   => $currentRow->credit_end_all,
            'credit_end_term'  => $currentRow->credit_end_term,
            'debit_end_all'    => $currentRow->debit_end_all,
            'debit_end_term'   => $currentRow->debit_end_term,
            'return_old_year'  => $currentRow->return_old_year,
        ];
        
        //Ложный DTO
        $fakeDto = UpdateOfsDto::fromArray($data);

        //Пересчитываем таблицу после сброса и выдаем результат
        return $this->task(UpdateOfsTask::class)->UpdateInfo($fakeDto);
    } 
}



