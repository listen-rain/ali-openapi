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

## Use Other Framework

update config/apiopenapi.php
```php
return [
    'accessKeyId'     => <ACCESS_KEY_ID>,
    'accessKeySecret' => <ACCESS_KEY_SECRET>,
    'endpointName'    => <Endpoint>,
    'regionId'        => <regionId>,
    'product'         => <Product>,
    'domain'          => 'nls-meta.cn-shanghai.aliyuncs.com'
];
```

reference demo.php
