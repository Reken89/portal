<?php

namespace App\Modules\DeloSection\Tasks;

use App\Core\Tasks\BaseTask;
use App\Modules\DeloSection\Models\Document;
use App\Modules\DeloSection\Dto\UpdateDocDto;

class UpdateDocuments extends BaseTask
{
    /**
     * Обновляем статус письма
     *
     * @param int $id
     * @return bool
     */
    public function UpdateStatus(int $id): bool
    {
        $result = Document::find($id)
            ->update([                
                 'status' => 20
            ]);       
        return $result == true ? true : false;
    }
    
    /**
     * Обновляем информацию в письме
     *
     * @param UpdateDocDto $dto
     * @return bool
     */
    public function UpdateDoc(UpdateDocDto $dto): bool
    {
        $result = Document::find($dto->id)
            ->update([                
                'status'           => 10,
                'npa_id'           => $dto->npa,
                'correspondent_id' => $dto->corr,
                'date'             => $dto->date,
                'content'          => $dto->content,
            ]);       
        return $result == true ? true : false;
    }
} 

