<?php

namespace App\Http\Controllers\Rbac\RolePermission;

use App\Services\Rbac\RolePermission\RolePermissionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class RolePermission
 *
 * 分配角色权限
 *
 * @author  luotao
 * @version 1.0
 * @package App\Http\Controllers\Rbac\RolePermission
 */
class RolePermission extends Controller
{
    /**
     * 分配角色权限service
     *
     * @var \App\Services\Rbac\RolePermission\RolePermissionService
     */
    private $rolePermissionService;
    
    /**
     * RolePermission constructor.
     *
     * @param \App\Services\Rbac\RolePermission\RolePermissionService $rolePermissionService
     */
    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param int                       $roleId
     *
     * @return array
     */
    public function store(Request $request, int $roleId) : array
    {
        $this->rolePermissionService->allotFrontendPermission($roleId, $request->post('permissionList', []));
        
        return $this->success();
    }
}
