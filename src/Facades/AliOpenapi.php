<?php
/**
 * Created by PhpStorm.
 * User: <zhufengwei@100tal.com>
 * Date: 2019/1/3
 * Time: 14:35
 */

namespace Listen\AliApi\Facades;

use Illuminate\Support\Facades\Facade;

class AliOpenapi extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'aliopenapi';
    }
}
