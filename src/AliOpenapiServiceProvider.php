<?php
/**
 * Created by PhpStorm.
 * User: <zhufengwei@100tal.com>
 * Date: 2019/1/3
 * Time: 14:36
 */

namespace Listen\AliOpenapi;


use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class AliOpenapiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/aliopenapi.php' => config_path('aliopenapi.php')
            ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/aliopenapi.php', 'aliopenapi'
        );

        $this->app->singleton('aliopenapi', function (Container $app) {
            return new  CreateToken(
                $app->make('config')
            );
        });
    }
}
