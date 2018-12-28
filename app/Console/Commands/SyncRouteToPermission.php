<?php

namespace App\Console\Commands;

use App\Constant\Permission\Type;
use App\Models\Permission;
use Illuminate\Foundation\Console\RouteListCommand;
use SuperHappysir\Support\Constant\Enum\StateEnum;

class SyncRouteToPermission extends RouteListCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'sync-route:send';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '同步路由数据到用户权限表';
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->syncPermission();
        $this->info('Route has send!');
    }
    
    /**
     * 同步路由数据到用户权限表
     *
     * @return bool
     */
    protected function syncPermission() : bool
    {
        $routesMap                 = $this->getRoutes();
        $existsParentPermissionMap = [];
        foreach ($routesMap as $route) {
            // 创建一个父级权限做归类
            $flag = explode('.', $route['name'])[0];
            if (empty($existsParentPermissionMap[$flag])) {
                /** @var Permission $parModel */
                $parModel              = Permission::firstOrNew([
                    'path'     => $flag,
                    'name'     => $flag,
                    'per_type' => Type::API,
                ]);
                $parModel->description = __('route.' . $flag);
                $parModel->state       = StateEnum::ENABLED;
                $parModel->save();
                $existsParentPermissionMap[$flag] = $parModel;
            }
            $parModel = $existsParentPermissionMap[$flag];
    
            // 创建路由权限
            /** @var Permission $permissionModel */
            $permissionModel              = Permission::firstOrNew([
                'method' => $route['method'],
                'path'   => $route['uri'],
            ]);
            $permissionModel->name        = $route['name'];
            $permissionModel->description = __('route.' . $route['name']);
            $permissionModel->per_type    = Type::API;
            $permissionModel->state       = StateEnum::ENABLED;
            $permissionModel->parent_id   = $parModel->id;
            $permissionModel->save();
        }
        
        return true;
    }
}
