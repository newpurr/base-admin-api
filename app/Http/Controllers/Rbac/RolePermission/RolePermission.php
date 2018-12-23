<?php

namespace App\Http\Controllers\Rbac\RolePermission;

use App\Http\Controllers\Controller;
use App\Services\Rbac\RolePermission\RolePermissionService;
use Illuminate\Http\Request;
use SuperHappysir\Support\Utils\Response\JsonResponseBodyInterface;

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
     * @return JsonResponseBodyInterface
     */
    public function store(Request $request, int $roleId) : JsonResponseBodyInterface
    {
        $this->rolePermissionService->allotFrontendPermission($roleId, $request->json('params.permission_list', []));
        
        return json_success_response();
    }
    
    /**
     * 获取角色拥有的权限ID数组
     *
     * @param int $roleId 角色ID
     *
     * @return JsonResponseBodyInterface
     */
    public function index($roleId) : JsonResponseBodyInterface
    {
        $permissionIdList = $this->rolePermissionService->getPermissionByRoleId($roleId);
        // dd(\DB::connection()->getQueryLog());
        return json_success_response([
            'permission_list' => $permissionIdList
        ]);
    }
}
