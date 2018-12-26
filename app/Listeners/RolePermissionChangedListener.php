<?php

namespace App\Listeners;

use App\Events\RolePermissionChanged;
use App\Models\Admin;
use App\Services\Admin\UserPermission\UserPermissionService;
use Cache;

class RolePermissionChangedListener
{
    /**
     * @var UserPermissionService
     */
    protected $userPermissionService;
    
    /**
     * UserRoleChangedListener constructor.
     *
     * @param UserPermissionService $userPermissionService
     */
    public function __construct(UserPermissionService $userPermissionService)
    {
        $this->userPermissionService = $userPermissionService;
    }
    
    /**
     * Handle the event.
     *
     * @param \App\Events\RolePermissionChanged $rolePermissionChanged
     *
     * @return void
     */
    public function handle(RolePermissionChanged $rolePermissionChanged)
    {
        $roleModel = $rolePermissionChanged->getRole();
        
        $userModelCollection = $roleModel->users;
        
        $userModelCollection->each(function (Admin $userModel) {
            Cache::forget("user_permission:{$userModel->getTable()}:{$userModel->id}");
        });
    }
}
