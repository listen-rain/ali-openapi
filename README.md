# Ali OpenAPi

Ali Openapi Package For Laravel5

## Usage

composer install 
```
composer require "listen/ali-openapi"
```

publish config
```
php artisan publish
```

update config/app.php
```
providers => [
    ......
    Listen\AliOpenapi\AliOpenapiServiceProvider::class,
],

......

aliases => [
    ......
    'AliOpenapi' => Listen\AliOpenapi\Facades\AliOpenapi::class,
] 
```

getToken
```
dd(AliOpenapi::getToken());
```

update .env
```
# aliyun 配置
ALI_ACCESS_KEY_ID=xxxxxx
ALI_ACCESS_KEY_SECRET=xxxxxx
```

