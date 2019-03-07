# Ali OpenAPi

Ali Openapi Package For Laravel5

[![Latest Stable Version](https://poser.pugx.org/listen/ali-openapi/v/stable)](https://packagist.org/packages/listen/ali-openapi)
[![Total Downloads](https://poser.pugx.org/listen/ali-openapi/downloads)](https://packagist.org/packages/listen/ali-openapi)
[![Latest Unstable Version](https://poser.pugx.org/listen/ali-openapi/v/unstable)](https://packagist.org/packages/listen/ali-openapi)
[![License](https://poser.pugx.org/listen/ali-openapi/license)](https://packagist.org/packages/listen/ali-openapi)
[![Monthly Downloads](https://poser.pugx.org/listen/ali-openapi/d/monthly)](https://packagist.org/packages/listen/ali-openapi)
[![Daily Downloads](https://poser.pugx.org/listen/ali-openapi/d/daily)](https://packagist.org/packages/listen/ali-openapi)
[![composer.lock](https://poser.pugx.org/listen/ali-openapi/composerlock)](https://packagist.org/packages/listen/ali-openapi)

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

