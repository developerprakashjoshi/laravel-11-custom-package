<?php

namespace Prakash\Todolist\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Prakash\Todolist\Skeleton\SkeletonClass
 */
class TaskFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'task';
    }
}
