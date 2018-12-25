<?php

namespace App\Repository\Contracts;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface AdminRepository.
 *
 * @package namespace App\Repository\Contracts;
 */
interface AdminRepository extends BaseRepostitory
{
    /**
     * 分配角色
     *
     * @param int   $userId    user id
     * @param array $roleIdArr the role model  primaryKey array
     *
     * @return bool
     */
    public function allotRole(int $userId, array $roleIdArr) : bool;
    
    /**
     * 清空角色
     *
     * @param int $userId
     *
     * @return bool
     */
    public function clearRoleByUserId(int $userId) : bool;
    
    /**
     * 根据用户ID获取用户拥有的角色
     *
     * @param int $userId
     *
     * @return Collection
     */
    public function getRoleCollectionByRoleId(int $userId) : Collection;
}
