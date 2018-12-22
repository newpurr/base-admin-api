<?php

namespace App\Providers;

use App\Services\Admin\User\Impl\UserServiceImpl;
use App\Services\Admin\User\UserService;
use App\Services\Rbac\Permission\Impl\PermisssionServiceImpl;
use App\Services\Rbac\Role\Impl\RoleServiceImpl;
use App\Services\Rbac\Permission\PermissionService;
use App\Services\Rbac\Role\RoleService;
use App\Services\Rbac\RolePermission\Impl\RolePermissionImpl;
use App\Services\Rbac\RolePermission\RolePermissionService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public $singletons = [
        RoleService::class           => RoleServiceImpl::class,
        RolePermissionService::class => RolePermissionImpl::class,
        PermissionService::class     => PermisssionServiceImpl::class,
        UserService::class           => UserServiceImpl::class,
    ];
}
