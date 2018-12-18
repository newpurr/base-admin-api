<?php

namespace App\Providers;

use App\Repository\Criteria\IsDeletedCriteria;
use App\Repository\Criteria\Permission\Id as PermissionId;
use App\Repository\Criteria\Role\RoleNameLikeCriteria;
use App\Repository\Criteria\StateCriteria;
use App\Repository\Criteria\Permission\Type as PermissionType;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class CriteriaServiceProvider extends ServiceProvider
{
    public $singletons = [
        IsDeletedCriteria::class    => IsDeletedCriteria::class,
        StateCriteria::class        => StateCriteria::class,
        PermissionType::class       => PermissionType::class,
        RoleNameLikeCriteria::class => RoleNameLikeCriteria::class,
        PermissionId::class         => PermissionId::class,
    ];
}
