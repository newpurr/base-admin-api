<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

function saveTree($tree, $parantId = 0)
{
    if(empty($tree)) {
        return true;
    }
    
    /** @var \App\Models\Permission $model */
    $model = \App\Models\Permission::firstOrNew([
        'per_type' => 2,
        'path'     => $tree['absolute_path']
    ]);
    
    $model->name         = $tree['name'];
    $model->description = $tree['title'];
    $model->parent_id   = $parantId;
    $model->save();
    
    if(empty($tree['children'])) {
        return true;
    }
    
    foreach ( $tree['children'] as $child) {
        saveTree($child,$model->id);
    }
    return true;
}

/** @var \Illuminate\Routing\Router $route */
$route = app(\Illuminate\Routing\Router::class);
$route->post('/permission', function (Request $request) {
    $data = $request->toArray();
    foreach ( $data['menus'] as $menu) {
        saveTree($menu);
    }
    return $data['menus'];
});

$route->post('role/{roleid}/permission', function (Request $request,$roleid) {
    $permissionCollection = collect($request->post('permissionList', []));
    $pathList = $permissionCollection->values();
    
    $idArr = \App\Models\Permission::whereIn('path', $pathList)->pluck('id');
    
    $idCollection = collect($idArr);
    
    $insertRolePermissionArr = [];
    
    $idCollection->map(function($item) use(&$insertRolePermissionArr,$roleid) {
        $insertRolePermissionArr[] = [
            'permission_id' => $item,
            'role_id' => $roleid,
            'created_at' => \Carbon\Carbon::now()
        ];
    });
    
    \App\Models\RolePermission::where('role_id', $roleid)->delete();
    \App\Models\RolePermission::insert($insertRolePermissionArr);
    return 1;
});

$route->get('/permission', function (Request $request) {
    return \App\Models\Permission::where('per_type', 2)->pluck('path');
});

$route->get('role/{roleid}/permission', function ($roleid) {
    $collection = \App\Models\RolePermission::where('role_id', $roleid)->with('permission:id,path')->get();

    $pathList = [];
    $collection->map(function(\App\Models\RolePermission $rolePermission) use(&$pathList) {
        $pathList[] = $rolePermission->permission->path ?? '';
    });
    
    return ['permission_list'=>$pathList];
});