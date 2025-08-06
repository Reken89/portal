<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;
use App\Modules\DeloSection\Dto\AddDocDto;
use App\Modules\DeloSection\Requests\AddDoc;
use App\Modules\DeloSection\Actions\DeloAdd;

class DeloController extends Controller
{
    
    /**
     * Добавляем новый документ
     *
     * @param 
     */
    public function AddDoc(AddDoc $request)
    {
        $dto = AddDocDto::fromRequest($request);
        $this->action(DeloAdd::class)->AddDoc($dto);       
    }
}

