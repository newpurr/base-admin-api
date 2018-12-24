<?php

namespace Tests\Service;

use App\Services\Rbac\RolePermission\RolePermissionService;
use Tests\TestCase;

class RolePermissionTest extends TestCase
{
    // use DatabaseTransactions;
    
    /**
     * @var RolePermissionService
     */
    protected $rolePermissionService;
    
    protected function setUp()
    {
        parent::setUp();
        $this->rolePermissionService = $this->app->get(RolePermissionService::class);
    }
    
    /**
     * 测试分配角色权限服务
     */
    public function testAllotFrontendPermission() : void
    {
        $roleId = 8888;
    
        $permissionPathArr = \App\Models\Permission::where('id', '>', 0)->limit(20)->pluck('path')->toArray();
    
        $status = $this->rolePermissionService->allotPermission($roleId, $permissionPathArr);
        $this->assertTrue($status);
    }
}
