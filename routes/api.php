<?php

use App\Models\Admin;
use App\Services\Admin\UserPermission\UserPermissionService;
use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */
$router = app(Router::class);

// 健康检查
$router->get('/_permission', function (UserPermissionService $permissionService) {
    return json_success_response($permissionService->getPermissionIdArr(Admin::find(1)));
});
$router->get('/_role', function (UserPermissionService $permissionService) {
    return json_success_response($permissionService->getRoleIdArr(Admin::find(1)));
});
$router->get('/update', function (UserPermissionService $permissionService) {
    return json_success_response((array)$permissionService->update(Admin::find(1)));
});

// 健康检查
$router->get('/health', function () {
    if (PHP_SAPI === 'cli' && extension_loaded('swoole')) {
        $response = Server::stats();
        $msg = 'hello ' . config('app.name');
    } else {
        $response = [];
        $msg = 'hello ' . config('app.name');
    }
    
    return json_success_response($response, $msg);
});

/*
|--------------------------------------------------------------------------
| 管理员管理API
|--------------------------------------------------------------------------
|
| 这里放置的用户相关操作的rest api
|
*/
// 权限rest资源增删改查路由
$router->apiResource('admin', 'Admin\UserController');

// 权限批量启用
$router->post('admin/_bulk/batchEnabled', 'Admin\UserController@batchEnable');

// 权限批量禁用
$router->post('admin/_bulk/batchDisabled', 'Admin\UserController@batchDisabled');

// 分配角色
$router->post('admin/{uid}/roles', 'Admin\UserController@allotRole');

// 角色查询
$router->get('admin/{uid}/roles', 'Admin\UserController@getRoleByRoleId');

$router->group([
    'prefix' => 'admin'
], function (Router $router) {
    // 认证
    $router->group([
        'prefix' => 'auth'
    ], function (Router $router) {
        // 登录
        $router->post('login', 'Admin\AuthController@login');
        
        // 退出
        $router->post('logout', 'Admin\AuthController@logout');
        
        // 刷新token
        $router->post('refresh', 'Admin\AuthController@refresh');
        
        // 用户信息
        $router->get('user', 'Admin\AuthController@user');
    });
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
$router->post('roles/{roleid}/permission', 'Rbac\Role\Role@allotPermission');

// 角色权限查询
$router->get('roles/{roleid}/permission', 'Rbac\Role\Role@getPermissionByRoleId');
