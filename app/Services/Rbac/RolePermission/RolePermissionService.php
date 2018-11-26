<?php

namespace App\Services\Rbac\RolePermission;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

/**
 * interface RolePermissionService
 *
 * 角色权限分配接口
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\RolePermission
 */
interface RolePermissionService
{
    /**
     * 分配角色后端接口权限
     *
     * @param int   $roleId          角色ID
     * @param array $permissionIdArr 权限ID数组
     *
     * @return bool
     */
    public function allotBackendPermission(int $roleId, array $permissionIdArr) : bool;
    
    /**
     * 分配角色后端接口权限
     *
     * @param int   $roleId            角色ID
     * @param array $permissionPathArr 权限path数组
     *
     * @return bool
     */
    public function allotFrontendPermission(int $roleId, array $permissionPathArr) : bool;
    
    /**
     * 删除分配给角色的全部权限
     *
     * @param int $roleId 角色ID
     *
     * @return bool
     */
    public function deleteByRoleId(int $roleId) : bool;
}
