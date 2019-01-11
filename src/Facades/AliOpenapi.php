<?php

namespace Listen\AliOpenapi\Facades;

use Illuminate\Support\Facades\Facade;

class AliOpenapi extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'aliopenapi';
    }
}
