<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;
use App\Modules\DeloSection\Dto\AddDocDto;
use App\Modules\DeloSection\Dto\UpdateStatusDto;
use App\Modules\DeloSection\Dto\UpdateDocDto;
use App\Modules\DeloSection\Dto\FilterDocDto;
use App\Modules\DeloSection\Dto\UpdateCorrDto;
use App\Modules\DeloSection\Dto\AddCorrDto;
use App\Modules\DeloSection\Dto\AddNpaDto;
use App\Modules\DeloSection\Requests\AddDoc;
use App\Modules\DeloSection\Requests\UpdateStatus;
use App\Modules\DeloSection\Requests\UpdateDoc;
use App\Modules\DeloSection\Requests\FilterDoc;
use App\Modules\DeloSection\Requests\UpdateCorrDoc;
use App\Modules\DeloSection\Requests\AddCorr;
use App\Modules\DeloSection\Requests\AddNpa;
use App\Modules\DeloSection\Actions\DeloAdd;
use App\Modules\DeloSection\Actions\DeloUpdate;
use App\Modules\DeloSection\Actions\CorrAdd;
use App\Modules\DeloSection\Actions\NpaAdd;

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
     * Добавляем корреспондента
     *
     * @param AddCorr $request
     */
    public function AddCorr(AddCorr $request)
    {
        $dto = AddCorrDto::fromRequest($request);
        $this->action(CorrAdd::class)->AddCorr($dto);       
    }
    
    /**
     * Добавляем справочник
     *
     * @param AddNpa $request
     */
    public function AddNpa(AddNpa $request)
    {
        $dto = AddNpaDto::fromRequest($request);
        $this->action(NpaAdd::class)->AddNpa($dto);       
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
     * Обновляем статус корреспондента
     *
     * @param UpdateStatus $request
     */
    public function UpdateCorrStatus(UpdateStatus $request)
    {
        $dto = UpdateStatusDto::fromRequest($request);
        $this->action(DeloUpdate::class)->UpdateCorrStatus($dto);   
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
    
    /**
     * Обновляем корреспондента
     *
     * @param UpdateCorrDoc $request
     */
    public function UpdateCorr(UpdateCorrDoc $request)
    {
        $dto = UpdateCorrDto::fromRequest($request);
        $this->action(DeloUpdate::class)->UpdateCorr($dto);
    }
    
    /**
     * Записываем фильтры в сессию
     *
     * @param 
     */
    public function ApplyFilter(FilterDoc $request)
    {
        $dto = FilterDocDto::fromRequest($request);
        session(['user_filter' => $dto->user_filter]);
    }
}

