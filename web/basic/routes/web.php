<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return [
        // 'lumen' => $router->app->version(),
        'ver' => 'v1.0.0',
        'clientIp' => $router->app->request->getClientIp(),
        'dateTime' => date('Y-m-d H:i:s'),
    ];
});

$router->get('/phpinfo', function () use ($router) {
    if (config('app.debug')) {
        phpinfo();
    }
});

$router->group(['namespace' => 'Admin', 'prefix' => '/api/admin'], function () use ($router) {
    $router->group(['namespace' => 'User', 'prefix' => 'user'], function() use ($router) {
       $router->get('/', 'Lists@run');
    });


});
