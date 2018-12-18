<?php

use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */
$router = app(Router::class);

/*
|--------------------------------------------------------------------------
| 用户管理API
|--------------------------------------------------------------------------
|
| 这里放置的用户相关操作的rest api
|
*/
$router->group([
    'prefix' => 'auth'
], function (Router $router) {
    // 登录
    $router->post('login', 'Auth\AuthController@login');
    
    // 退出
    $router->post('logout', 'Auth\AuthController@logout');
    
    // 刷新token
    $router->post('refresh', 'Auth\AuthController@refresh');
    
    // 用户信息
    $router->get('user', 'Auth\AuthController@user');
});

/*
|--------------------------------------------------------------------------
| 权限管理API
|--------------------------------------------------------------------------
|
| 这里放置的权限相关操作的rest api
|
*/
// 所有前端权限
$router->get('permission/frontend/path', 'Rbac\Permission\Permission@theFrontEndPath');

// 权限批量启用
$router->post('permission/_bulk/batchEnable', 'Rbac\Permission\Permission@batchEnable');

// 权限批量禁用
$router->post('permission/_bulk/batchDisabled', 'Rbac\Permission\Permission@batchDisabled');

// 权限rest资源增删改查路由
$router->apiResource('permission', 'Rbac\Permission\Permission');

/*** 角色管理API ***/

/*
|--------------------------------------------------------------------------
| 角色管理API
|--------------------------------------------------------------------------
|
| 这里放置的角色相关操作的rest api
|
*/
// 角色批量启用
$router->post('roles/_bulk/batchEnable', 'Rbac\Role\Role@batchEnable');

// 角色批量禁用
$router->post('roles/_bulk/batchDisabled', 'Rbac\Role\Role@batchDisabled');

// 角色rest资源增删改查路由
$router->apiResource('roles', 'Rbac\Role\Role');

// 角色权限分配
$router->post('roles/{roleid}/permission', 'Rbac\RolePermission\RolePermission@store');

// 角色权限查询
$router->get('roles/{roleid}/permission', 'Rbac\RolePermission\RolePermission@index');
