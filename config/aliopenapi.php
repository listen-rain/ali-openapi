<?php

return [
    'accessKeyId'     => env('ALI_ACCESS_KEY_ID', ''),
    'accessKeySecret' => env('ALI_ACCESS_KEY_SECRET', ''),
    'endpointName'    => 'cn-shanghai',
    'regionId'        => 'cn-shanghai',
    'product'         => 'nls-cloud-meta',
    'domain'          => 'nls-meta.cn-shanghai.aliyuncs.com',

    'log_file'    => storage_path('logs/aliopenapi.log'),
    'log_channel' => env('ALIVMS_LOG_CHANNEL', 'aliopenapi'),
    'log_mode'    => env('ALIVMS_LOG_MODE', 'single')
];
