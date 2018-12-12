<?php

namespace App\Http\Controllers\Rbac\RolePermission;

use App\Http\Controllers\Controller;
use App\Services\Rbac\RolePermission\RolePermissionService;
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
     * @var RolePermissionService
     */
    private $rolePermissionService;
    
    /**
     * RolePermission constructor.
     *
     * @param RolePermissionService $rolePermissionService
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
        
        return json_response()->success();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param int $roleId 角色ID
     *
     * @return array
     */
    public function path($roleId) : array
    {
    
        $array = $this->rolePermissionService->getFrontendPathByRoleId($roleId);
        
        return json_response()->success($array);
    }
}
