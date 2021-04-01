<?php
/** @var \Laravel\Lumen\Routing\Router $router */

// 后端管理接口
$router->group(['namespace' => 'Admin', 'prefix' => '/api/admin'], function () use ($router) {
    // 主页模块
    $router->group(['namespace' => 'Home', 'prefix' => 'home'], function() use ($router) {
        $router->get('/currentUser', 'CurrentUser@run');
    });
    // 用户模块
    $router->group(['namespace' => 'User', 'prefix' => 'user'], function() use ($router) {
        $router->get('/', 'Lists@run');
    });

    // 登录模块
    $router->group(['namespace' => 'Login', 'prefix' => 'user'], function() use ($router) {
        $router->post('/login', 'Login@run');
    });
});
