<?php
/**
 * Created by PhpStorm.
 * User: <zhufengwei@100tal.com>
 * Date: 2019/1/2
 * Time: 16:06
 */

require __DIR__ . '/vendor/autoload.php';

$config     = require __DIR__ . '/src/config/aliapi.php';
$repository = new \Illuminate\Config\Repository(['aliopenapi' => $config]);
print_r((new \AliApi\CreateToken($repository))->getToken());
