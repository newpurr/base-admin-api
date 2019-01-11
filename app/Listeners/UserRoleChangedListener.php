<?php

namespace App\Listeners;

use App\Events\UserRoleChanged;
use App\Services\Admin\UserPermission\UserPermissionService;

class UserRoleChangedListener
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
     * @param \App\Events\UserRoleChanged $userRoleChanged
     *
     * @return void
     */
    public function handle(UserRoleChanged $userRoleChanged) : void
    {
        if ($userModel = $userRoleChanged->getUserModel()) {
            $this->userPermissionService->saveToCache(
                $userModel
            );
        }
    }
}
