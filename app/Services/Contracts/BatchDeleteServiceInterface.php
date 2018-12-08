<?php

namespace App\Services\Contracts;

/**
 * Interface BatchDeleteServiceInterface
 *
 * 批量操作接口
 *
 * @author  luotao
 * @version 1.0
 * @package App\Services\Rbac\Role\Contracts
 */
interface BatchDeleteServiceInterface
{
    /**
     * 批量删除
     *
     * @param array $idArr
     *
     * @return bool
     */
    public function batchSoftDelete(array $idArr) : bool;
}
