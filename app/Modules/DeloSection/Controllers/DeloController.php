<?php

namespace App\Modules\DeloSection\Controllers;

use App\Core\Controllers\Controller;
use App\Modules\DeloSection\Dto\AddDocDto;
use App\Modules\DeloSection\Requests\AddDoc;

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
        var_dump($dto->content);
    }
}

