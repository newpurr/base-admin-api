<?php

namespace App\Repository\Contracts;

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
     * @param int   $roleId            role id
     * @param array $permissionIdArr   the permission model  primaryKey array
     *
     * @return bool
     */
    public function allotPermission(int $roleId, array $permissionIdArr) : bool;
}
