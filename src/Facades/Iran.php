<?php

namespace Shimadotdev\IranRegions\Facades;

use Illuminate\Support\Facades\Facade;

class Iran extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'iran';
    }
}
