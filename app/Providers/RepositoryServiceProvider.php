<?php

namespace App\Providers;

use App\Repository\Contracts\PermissionRepository;
use App\Repository\Contracts\RolePermissionRepository;
use App\Repository\Contracts\RoleRepository;
use App\Repository\Repositories\PermissionRepositoryEloquent;
use App\Repository\Repositories\RolePermissionRepositoryEloquent;
use App\Repository\Repositories\RoleRepositoryEloquent;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $singletons = [
        RoleRepository::class           => RoleRepositoryEloquent::class,
        RolePermissionRepository::class => RolePermissionRepositoryEloquent::class,
        PermissionRepository::class     => PermissionRepositoryEloquent::class,
    ];
}
