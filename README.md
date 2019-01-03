# Ali - OpenAPi

ali openapi package

# Usage

## Use Laravel

install 
```
composer require "listen/ali-openapi:dev-master"
```

publish config
```
php artisan publish
```

update config/app.php
```
providers => [
    ......
    Listen\AliApi\AliOpenapiServiceProvider::class,
],

......

aliases => [
    ......
    'AliOpenapi' => Listen\AliApi\Facades\AliOpenapi::class,
] 
```

getToken
```
dd(AliOpenapi::getToken());
```

## Use Other Framework

reference demo.php
