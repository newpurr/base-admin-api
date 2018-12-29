<?php

namespace App\Providers;

use App\Events\RolePermissionChanged;
use App\Events\UserRoleChanged;
use App\Listeners\RolePermissionChangedListener;
use App\Listeners\UserRoleChangedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserRoleChanged::class => [
            UserRoleChangedListener::class
        ],
        RolePermissionChanged::class => [
            RolePermissionChangedListener::class
        ],
    ];
    
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        //
    }
}
