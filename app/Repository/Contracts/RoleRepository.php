<?php

namespace App\Repository\Contracts;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface RoleRepository.
 *
 * @package namespace App\Repository\Contracts;
 */
interface RoleRepository extends BaseRepostitory
{
    /**
     * 分配权限
     *
     * @param int   $roleId          role id
     * @param array $permissionIdArr the permission model  primaryKey array
     *
     * @return bool
     */
    public function allotPermission(int $roleId, array $permissionIdArr) : bool;
    
    /**
     * 清空角色拥有的的权限
     *
     * @param int $roleId
     *
     * @return bool
     */
    public function clearPermissionByRoleId(int $roleId) : bool;
    
    /**
     * 根据角色ID获取角色拥有的权限
     *
     * @param int $roleId
     *
     * @return Collection
     */
    public function getPermissionCollectionByRoleId(int $roleId) : Collection;
    
    /**
     * 根据角色ID获取角色拥有的权限
     *
     * @param array $roleIdArr
     *
     * @return Collection
     */
    public function getPermissionCollectionByRoleIdArr(array $roleIdArr) : Collection;
}
