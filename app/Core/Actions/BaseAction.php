<?php

namespace App\Core\Actions;

use App\Core\Tasks\BaseTask;

abstract class BaseAction
{
    /**
     * Возращает объект Task
     *
     * @param string $class
     * @return BaseTask
     */
    public function task(string $class): BaseTask
    {
        return new $class;
    }
}

