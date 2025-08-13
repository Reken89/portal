<?php

namespace App\Modules\DeloSection\Actions;

use App\Core\Actions\BaseAction;
use App\Modules\DeloSection\Dto\AddNpaDto;
use App\Modules\DeloSection\Models\Npa;

class NpaAdd extends BaseAction
{
    /**
     * Добавляем справочник
     *
     * @param AddNpaDto $dto
     * @return bool
     */
    public function AddNpa(AddNpaDto $dto): bool
    {
        $result = Npa::create([
            'title'  => $dto->title,
        ]);
        return $result == true ? true : false;
    }
}

