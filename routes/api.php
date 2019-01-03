<?php
use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */
$router = app(Router::class);

/*
|--------------------------------------------------------------------------
| 系统管理API
|--------------------------------------------------------------------------
|
| 这里放置的系统管理相关API
|
*/
// 健康检查
$router->get('/system/health', function () {
    if (PHP_SAPI === 'cli' && extension_loaded('swoole')) {
        $response = Server::stats();
        $msg = 'hello ' . config('app.name');
    } else {
        $response = [];
        $msg = 'hello ' . config('app.name');
    }
    
    return json_success_response($response, $msg);
})->middleware('auth:admin_api')->name('system.health');

// 同步路由数据到权限表
$router->get('/system/sync-route', function () {
    Artisan::call('base-admin:sync-route');
    
    return json_success_response([]);
})->middleware('auth:admin_api')->name('system.sync-route');



/*
|--------------------------------------------------------------------------
| 管理员管理API
|--------------------------------------------------------------------------
|
| 这里放置的用户相关操作的rest api
|
*/
// 登录
$router->post('admin/auth/login', 'Admin\AuthController@login')
    ->name('admin.auth.login');

// 刷新token
$router->post('admin/auth/refresh', 'Admin\AuthController@refresh')
    ->name('admin.auth.refresh');

$router->group([
    'middleware' => 'auth:admin_api'
], function (Router $router) {
    // 权限rest资源增删改查路由
    $router->apiResource('admin', 'Admin\UserController');
    
    // 权限批量启用
    $router->post('admin/_bulk/batchEnabled', 'Admin\UserController@batchEnable')
           ->name('admin.batchEnable');
    
    // 权限批量禁用
    $router->post('admin/_bulk/batchDisabled', 'Admin\UserController@batchDisabled')
           ->name('admin.batchDisabled');
    
    // 分配角色
    $router->post('admin/{uid}/roles', 'Admin\UserController@allotRole')
           ->name('admin.allotRole');
    
    // 角色查询
    $router->get('admin/{uid}/roles', 'Admin\UserController@getRoleByRoleId')
           ->name('admin.getRoleByRoleId');
    
    // 角色查询
    $router->get('admin/{uid}/permission', 'Admin\UserController@getPermissionByRoleId')
           ->name('admin.getPermissionByRoleId');
    
    // 认证
    $router->group([
        'prefix' => 'admin/auth'
    ], function (Router $router) {
        // 退出
        $router->post('logout', 'Admin\AuthController@logout')
               ->name('admin.auth.logout');
        
        // 用户信息
        $router->get('user', 'Admin\AuthController@user')
               ->name('admin.auth.user');
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
$router->group([
    'middleware' => 'auth:admin_api'
], function (Router $router) {
    // 所有前端权限
    $router->get('permission/frontend/path', 'Rbac\Permission\Permission@theFrontEndPath')
           ->name('permission.theFrontEndPath');
    
    // 权限批量启用
    $router->post('permission/_bulk/batchEnable', 'Rbac\Permission\Permission@batchEnable')
           ->name('permission.batchEnable');
    
    // 权限批量禁用
    $router->post('permission/_bulk/batchDisabled', 'Rbac\Permission\Permission@batchDisabled')
           ->name('permission.batchDisabled');
    
    // 权限rest资源增删改查路由
    $router->apiResource('permission', 'Rbac\Permission\Permission');
});


/*
|--------------------------------------------------------------------------
| 角色管理API
|--------------------------------------------------------------------------
|
| 这里放置的角色相关操作的rest api
|
*/
$router->group([
    'middleware' => 'auth:admin_api'
], function (Router $router) {
    // 角色批量启用
    $router->post('roles/_bulk/batchEnable', 'Rbac\Role\Role@batchEnable')
           ->name('roles.batchEnable');
    
    // 角色批量禁用
    $router->post('roles/_bulk/batchDisabled', 'Rbac\Role\Role@batchDisabled')
           ->name('roles.batchDisabled');
    
    // 角色rest资源增删改查路由
    $router->apiResource('roles', 'Rbac\Role\Role');
    
    // 角色权限分配
    $router->post('roles/{roleid}/permission', 'Rbac\Role\Role@allotPermission')
           ->name('roles.allotPermission');
    
    // 角色权限查询
    $router->get('roles/{roleid}/permission', 'Rbac\Role\Role@getPermissionByRoleId')
           ->name('roles.getPermissionByRoleId');
});
