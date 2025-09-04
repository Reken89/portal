<?php

namespace App\Modules\UtilitiesSection\Admin\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\UtilitiesSection\Admin\Models\Utilities;

class UpdateUtilitiesTask extends BaseTask
{
    /**
     * Обновление статуса
     *
     * @param int $id, int $status
     * @return bool
     */
    public function UpdateStatus(int $id, int $status): bool
    {        
        $result = Utilities::find($id)
        ->update([                  
            'status' => $status,
        ]);
        return $result == true ? true : false;
    }  
}

