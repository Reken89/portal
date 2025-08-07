<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;
use App\Modules\DeloSection\Dto\AddDocDto;
use App\Modules\DeloSection\Dto\UpdateStatusDto;
use App\Modules\DeloSection\Dto\UpdateDocDto;
use App\Modules\DeloSection\Requests\AddDoc;
use App\Modules\DeloSection\Requests\UpdateStatus;
use App\Modules\DeloSection\Requests\UpdateDoc;
use App\Modules\DeloSection\Actions\DeloAdd;
use App\Modules\DeloSection\Actions\DeloUpdate;

class DeloController extends Controller
{
    
    /**
     * Добавляем новый документ
     *
     * @param AddDoc $request
     */
    public function AddDoc(AddDoc $request)
    {
        $dto = AddDocDto::fromRequest($request);
        $this->action(DeloAdd::class)->AddDoc($dto);       
    }
    
    /**
     * Обновляем статус письма
     *
     * @param UpdateStatus $request
     */
    public function UpdateStatus(UpdateStatus $request)
    {
        $dto = UpdateStatusDto::fromRequest($request);
        $this->action(DeloUpdate::class)->UpdateStatus($dto);   
    }
    
    /**
     * Обновляем информацию в письме
     *
     * @param 
     */
    public function UpdateDoc(UpdateDoc $request)
    {
        $dto = UpdateDocDto::fromRequest($request);
        $this->action(DeloUpdate::class)->UpdateDoc($dto);
    }
}

