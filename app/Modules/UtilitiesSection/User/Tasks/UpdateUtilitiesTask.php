<?php

namespace App\Modules\UtilitiesSection\User\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\UtilitiesSection\Admin\Models\Utilities;
use App\Modules\UtilitiesSection\User\Dto\UpdateUtilitiesDto;

class UpdateUtilitiesTask extends BaseTask
{
    /**
     * Обновляем значения в таблице utilities
     *
     * @param UpdateUtilitiesDto $dto
     * @return bool
     */
    public function UpdateUtilities(UpdateUtilitiesDto $dto): bool
    {        
        $result = Utilities::find($dto->id)
            ->update([                
                "mb_volume_$dto->type" => $dto->mb_volume,
                "pd_volume_$dto->type" => $dto->pd_volume,
                "mb_sum_$dto->type"    => $dto->mb_sum,
                "pd_sum_$dto->type"    => $dto->pd_sum,
                'date'                 => date('Y-m-d'),
            ]);
        return $result == true ? true : false;
    }
    
    /**
     * Обновляем статус строки
     *
     * @param int $id, int $status
     * @return bool
     */
    public function UpdateStatus(int $id, int $status): bool
    {      
        $result = Utilities::find($id)
            ->update([                
                "status" => $status,
                'date'   => date('Y-m-d'),
            ]);
        return $result == true ? true : false;
    }
    
    /**
     * Персональное обновление
     * "Негативные воздействия"
     *
     * @param UpdateUtilitiesDto $dto
     * @return bool
     */
    public function UpdateNegative(UpdateUtilitiesDto $dto): bool
    {    
        $result = Utilities::find($dto->id)
            ->update([                
                "mb_volume_negative" => $dto->mb_volume*0.5,
                "pd_volume_negative" => $dto->pd_volume*0.5,
                "mb_sum_negative"    => $dto->mb_sum*0.5,
                "pd_sum_negative"    => $dto->pd_sum*0.5
            ]);
        return $result == true ? true : false;
    }
    
}
