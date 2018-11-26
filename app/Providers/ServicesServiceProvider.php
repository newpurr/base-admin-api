<?php

namespace App\Providers;

use App\Services\Rbac\Role\Impl\RoleServiceImpl;
use App\Services\Rbac\Role\RoleService;
use App\Services\Rbac\RolePermission\Impl\RolePermissionImpl;
use App\Services\Rbac\RolePermission\RolePermissionService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public $singletons = [
        RoleService::class           => RoleServiceImpl::class,
        RolePermissionService::class => RolePermissionImpl::class
    ];
}
