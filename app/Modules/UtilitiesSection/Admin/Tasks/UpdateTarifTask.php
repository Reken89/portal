<?php

namespace App\Modules\UtilitiesSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\UtilitiesSection\Admin\Models\Tarif;
use App\Modules\UtilitiesSection\Admin\Dto\UpdateTariffsDto;

class UpdateTarifTask extends BaseTask
{
    /**
     * Обновление тарифов
     *
     * @param UpdateTariffsDto $dto
     * @return bool
     */
    public function UpdateTariffs(UpdateTariffsDto $dto): bool
    {        
        $result = Tarif::find($dto->id)
        ->update([                  
            'tarif_min' => $dto->tarif_min,
            'tarif_max' => $dto->tarif_max,
            'date'      => date('Y-m-d'),
        ]);
        return $result == true ? true : false;
    }  
    
    /**
     * Обновление тарифов
     * Метод разработан для циклического обращения
     *
     * @param int $year, int $mounth, array $info
     * @return bool
     */
    public function UpdateTeam(int $year, int $mounth, array $info): bool
    {        
        $result = Tarif::where('year', $year)
            ->where('mounth', $mounth) 
            ->where('title', $info['title']);    
        $result->update([                
            'tarif_min' => $info['tarif_min'],
            'tarif_max' => $info['tarif_max'],
            'date'      => date('Y-m-d'),
        ]);
        return $result == true ? true : false;
    } 
}


