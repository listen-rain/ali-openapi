# Ali OpenAPi

Ali Openapi Package For Laravel5

## Usage

composer install 
```bash
composer require "listen/ali-openapi"
```

publish config
```bash
php artisan publish
```

update config/app.php
```php
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
```php
dd(AliOpenapi::getToken());
```

update .env
```
# aliyun 配置
ALI_ACCESS_KEY_ID=xxxxxx
ALI_ACCESS_KEY_SECRET=xxxxxx
```

set exception notify

```php
\AliOpenapi::pushExceptionCallback('dingtalk', function ($module, $message, $code, $otherParams) {
            // https://github.com/listen-rain/dingtalk
            sendByDingtalk($message . "\n\n Code: {$code}", "{$module}.error");
        });
```

