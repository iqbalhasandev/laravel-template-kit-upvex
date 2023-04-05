<?php

namespace Modules\Backup\Facades;

use Illuminate\Support\Facades\Facade;

class Backup extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Modules\Backup\Backup::class;
    }
}
