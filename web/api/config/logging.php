<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: logging.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 5:04 下午
 * Created by PhpStorm
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['daily', 'single'],
            'permission' => 0666
        ],
        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/error.log'),
            'level' => 'error',
            'permission' => 0666
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/lumen.log'),
            'level' => 'debug',
            'days' => 180,
            'permission' => 0666
        ],
        'api' => [
            'driver' => 'daily',
            'path' => storage_path('logs/api.log'),
            'level' => 'info',
            'permission' => 0666
        ],
        'api_error' => [
            'driver' => 'daily',
            'path' => storage_path('logs/api_error.log'),
            'level' => 'error',
            'permission' => 0666
        ],
    ],

];
