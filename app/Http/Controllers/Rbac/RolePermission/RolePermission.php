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
     * 获取角色拥有的权限ID数组
     *
     * @param int $roleId 角色ID
     *
     * @return array
     */
    public function index($roleId) : array
    {
        $permissionIdList = $this->rolePermissionService->getPermissionByRoleId($roleId);
        
        return json_response()->success([
            'permission_id_list' => $permissionIdList
        ]);
    }
}
