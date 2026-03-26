<?php

namespace App\Modules\Ofs26Section\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use Illuminate\Support\Facades\DB;
use App\Modules\Ofs26Section\Admin\Dto\UpdateOfsStatusDto;

class UpdateOfsTask extends BaseTask
{   
    /**
     * Меняем статус
     *
     * @param UpdateOfsStatusDto $dto
     * @return bool
     */
    public function updateStatus(UpdateOfsStatusDto $dto): bool
    { 
        return (bool) DB::table('ofs26')
        ->where('user_id', $dto->user_id)
        ->where('mounth', $dto->month)
        ->where('status', '!=', 2)
        ->update([                
            'status' => 2,
        ]);       
    }    
}





