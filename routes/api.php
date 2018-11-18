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

if (!function_exists('saveTree')) {
    function saveTree($tree, $parantId = 0)
    {
        if (empty($tree)) {
            return true;
        }
        
        /** @var \App\Models\Permission $model */
        $model = \App\Models\Permission::firstOrNew([
            'per_type' => 2,
            'path'     => $tree['absolute_path']
        ]);
        
        $model->name        = $tree['name'];
        $model->description = $tree['title'];
        $model->per_type    = $tree['per_type'];
        $model->parent_id   = $parantId;
        $model->save();
        
        if (empty($tree['children'])) {
            return true;
        }
        
        foreach ($tree['children'] as $child) {
            saveTree($child, $model->id);
        }
        
        return true;
    }
}

/** @var \Illuminate\Routing\Router $route */
$route = app(\Illuminate\Routing\Router::class);
$route->post('/permission', function (Request $request) {
    $data = $request->toArray();
    foreach ($data['menus'] as $menu) {
        saveTree($menu);
    }
    
    return $data['menus'];
});

$route->post('role/{roleid}/permission', function (Request $request, $roleid) {
    $permissionCollection = collect($request->post('permissionList', []));
    $pathList             = $permissionCollection->values();
    
    $idArr = \App\Models\Permission::whereIn('path', $pathList)->pluck('id');
    
    $idCollection = collect($idArr);
    
    $insertRolePermissionArr = [];
    
    $idCollection->map(function ($item) use (&$insertRolePermissionArr, $roleid) {
        $insertRolePermissionArr[] = [
            'permission_id' => $item,
            'role_id'       => $roleid,
            'created_at'    => \Carbon\Carbon::now()
        ];
    });
    
    \App\Models\RolePermission::where('role_id', $roleid)->delete();
    \App\Models\RolePermission::insert($insertRolePermissionArr);
    
    return 1;
});

$route->get('/permission', function (Request $request) {
    return \App\Models\Permission::whereIn('per_type', [ 2, 3 ])->pluck('path');
});

$route->delete('/permission/{id}', function (int $id) {
    return \App\Models\Permission::where('id', $id)->delete();
});

$route->get('role/{roleid}/permission', function ($roleid) {
    $collection = \App\Models\RolePermission::where('role_id', $roleid)->with('permission:id,path')->get();
    
    $pathList = [];
    $collection->map(function (\App\Models\RolePermission $rolePermission) use (&$pathList) {
        $pathList[] = $rolePermission->permission->path ?? '';
    });
    
    return [ 'permission_list' => $pathList ];
});

$route->get('/button', function () {
    $collection = \App\Models\Permission::where('per_type', 3)->with('parentPermission')->get();
    
    $pathList = [];
    $collection->filter(function ($item) {
        return $item->parentPermission !== null;
    })->map(function (\App\Models\Permission $permission) use (&$pathList) {
        $pathList[ $permission->parentPermission->path ][] = [
            'id'       => $permission->id,
            'path'     => $permission->path,
            'name'     => $permission->name,
            'title'    => $permission->description,
            'per_type' => $permission->per_type
        ];
    });
    
    return $pathList;
})->name('button');

$route->get('role/{roleid}/button', function ($roleid) {
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
        $pathList[ $rolePermission->permission->parentPermission->path ][] = [
            'id'       => $rolePermission->permission->id,
            'path'     => $rolePermission->permission->path,
            'name'     => $rolePermission->permission->name,
            'title'    => $rolePermission->permission->description,
            'per_type' => $rolePermission->permission->per_type
        ];
    });
    
    return $pathList;
})->name('button');

$route->apiResource('roles', 'Rbac\Role\Role');

$route->post('roles/batchDestory', 'Rbac\Role\Role@batchDestory');
$route->post('roles/batchEnable', 'Rbac\Role\Role@batchEnable');
