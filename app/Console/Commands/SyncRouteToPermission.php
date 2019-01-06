<?php

namespace App\Console\Commands;

use App\Constant\Permission\Type;
use App\Models\Permission;
use Illuminate\Foundation\Console\RouteListCommand;
use Illuminate\Support\Facades\Artisan;
use SuperHappysir\Support\Constant\Enum\StateEnum;

/**
 * Class SyncRouteToPermission
 *
 * 同步路由权限命令
 *
 * @author  SuperHappysir
 * @version 1.0
 * @package App\Console\Commands
 */
class SyncRouteToPermission extends RouteListCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'base-admin:sync-route';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '同步路由数据到权限表';
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->syncPermission();
        
        $this->info('Execute successfully!');
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
                    'permission_type' => Type::API,
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
            $permissionModel->permission_type    = Type::API;
            $permissionModel->state       = StateEnum::ENABLED;
            $permissionModel->parent_id   = $parModel->id;
            $permissionModel->save();
        }
        
        // 给超级管理员分配所有权限
        Artisan::call('base-admin:ass-all-per');
        
        return true;
    }
}
