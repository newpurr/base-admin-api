<?php

namespace App\Providers;

use App\Repository\Criteria\IsDeletedCriteria;
use App\Repository\Criteria\Role\RoleNameLikeCriteria;
use App\Repository\Criteria\StateCriteria;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class CriteriaServiceProvider extends ServiceProvider
{
    public $singletons = [
        IsDeletedCriteria::class    => IsDeletedCriteria::class,
        StateCriteria::class        => StateCriteria::class,
        RoleNameLikeCriteria::class => RoleNameLikeCriteria::class,
    ];
}
