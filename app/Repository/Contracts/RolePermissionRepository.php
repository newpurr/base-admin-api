<?php

namespace App\Repository\Contracts;

/**
 * Interface RolePermissionRepository.
 *
 * @package namespace App\Repository\Contracts;
 */
interface RolePermissionRepository extends BaseRepostitory
{
    /**
     * 根据条件删除
     *
     * @param array $where
     *
     * @return mixed
     */
    public function deleteWhere(array $where);
}
