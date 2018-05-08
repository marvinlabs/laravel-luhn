<?php

namespace MarvinLabs\Luhn\Facades;

use Illuminate\Support\Facades\Facade;

class Luhn extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'luhn';
    }
}
