<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */
$router = app(Router::class);

/*** JWT 用户认证 ***/
$router->group([
    'middleware' => 'api',
    'prefix'     => 'auth'
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


/*** 权限管理 ***/
$router->group([
    'middleware' => 'api',
    'prefix'     => 'permission'
], function (Router $router) {
    // $router->get('/', function () {
    //     return \App\Models\Permission::whereIn('per_type', [
    //         2,
    //     ])->pluck('path');
    // });
    $router->get('/', 'Rbac\Permission\Permission@index');
    $router->post('/', function (Request $request) {
        $data = $request->toArray();
        foreach ($data['menus'] as $menu) {
            saveTree($menu);
        }
        
        return $data['menus'];
    });
    $router->delete('/permission/{id}', function (int $id) {
        return \App\Models\Permission::where('id', $id)->delete();
    });
});


$router->post('role/{roleid}/permission', 'Rbac\RolePermission\RolePermission@store');
$router->get('role/{roleid}/permission', function ($roleid) {
    $collection = \App\Models\RolePermission::where('role_id', $roleid)->with('permission:id,path')->get();
    
    $pathList = [];
    $collection->map(function (\App\Models\RolePermission $rolePermission) use (&$pathList) {
        $pathList[] = $rolePermission->permission->path ?? '';
    });
    
    return ['permission_list' => $pathList];
});


$router->get('/button', function () {
    $collection = \App\Models\Permission::where('per_type', 3)->with('parentPermission')->get();
    
    $pathList = [];
    $collection->filter(function ($item) {
        return $item->parentPermission !== null;
    })->map(function (\App\Models\Permission $permission) use (&$pathList) {
        $pathList[$permission->parentPermission->path][] = [
            'id'       => $permission->id,
            'path'     => $permission->path,
            'name'     => $permission->name,
            'title'    => $permission->description,
            'per_type' => $permission->per_type
        ];
    });
    
    return $pathList;
})->name('button');

$router->get('role/{roleid}/button', function ($roleid) {
    $collection = \App\Models\RolePermission::where('role_id', $roleid)->with([
        'permission' => function ($query) {
            $query->where('per_type', 3);
        },
        'permission.parentPermission'
    ])->get();
    
    $pathList = [];
    $collection->filter(function ($item) {
        return $item->permission !== null;
    })->map(function (\App\Models\RolePermission $rolePermission) use (&$pathList) {
        $pathList[$rolePermission->permission->parentPermission->path][] = [
            'id'       => $rolePermission->permission->id,
            'path'     => $rolePermission->permission->path,
            'name'     => $rolePermission->permission->name,
            'title'    => $rolePermission->permission->description,
            'per_type' => $rolePermission->permission->per_type
        ];
    });
    
    return $pathList;
});

// 角色管理API
$router->apiResource('roles', 'Rbac\Role\Role');
$router->post('roles/_bulk/batchEnable', 'Rbac\Role\Role@batchEnable');
$router->post('roles/_bulk/batchDestory', 'Rbac\Role\Role@batchDisabled');

// 权限管理API
$router->apiResource('permission', 'Rbac\Permission\Permission');
$router->post('permission/_bulk/batchEnable', 'Rbac\Permission\Permission@batchEnable');
$router->post('permission/_bulk/batchDestory', 'Rbac\Permission\Permission@batchDisabled');
