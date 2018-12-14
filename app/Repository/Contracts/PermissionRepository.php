<?php

namespace App\Repository\Contracts;

/**
 * Interface PermissionRepository.
 *
 * @package namespace App\Repository\Contracts;
 */
interface PermissionRepository extends BaseRepostitory
{
    /**
     * 获取所有前端path
     *
     * @return array
     */
    public function getTheFrontEndPath() : array;
}
