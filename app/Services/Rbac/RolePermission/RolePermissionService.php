<?php

namespace App\Services\Rbac\RolePermission;

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
     * 分配角色权限
     *
     * @param int   $roleId          角色ID
     * @param array $permissionIdArr 权限id数组
     *
     * @return bool
     */
    public function allotPermission(int $roleId, array $permissionIdArr) : bool;
    
    /**
     * 删除分配给角色的全部权限
     *
     * @param int $roleId 角色ID
     *
     * @return bool
     */
    public function deleteByRoleId(int $roleId) : bool;
    
    /**
     * 根据角色ID获取角色权限path路径
     *
     * @param int $roleId
     *
     * @return Collection
     */
    public function getPermissionByRoleId(int $roleId) : Collection;
}
