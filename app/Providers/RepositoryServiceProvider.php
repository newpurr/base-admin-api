<?php

namespace App\Providers;

use App\Repository\Contracts\AdminRepository;
use App\Repository\Contracts\PermissionRepository;
use App\Repository\Contracts\RoleRepository;
use App\Repository\Repositories\AdminRepositoryEloquent;
use App\Repository\Repositories\PermissionRepositoryEloquent;
use App\Repository\Repositories\RoleRepositoryEloquent;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public $singletons = [
        RoleRepository::class           => RoleRepositoryEloquent::class,
        PermissionRepository::class     => PermissionRepositoryEloquent::class,
        AdminRepository::class          => AdminRepositoryEloquent::class,
    ];
}
